<?php
namespace BigInteger;

class BigInteger {
    /**
     * The base of BigInteger.
     * @type integer
     */
    private $base;
    /**
     * The array representation of BigInteger.
     * 1023 is represented by the following:
     * [3, 2, 0, 1]
     * @type array
     */
    private $digits = [];

    /**
     * The flag which means tha this BigInteger is a negative number or not.
     * @type boolean
     */
    private $negative = false;

    public function __construct($i, $base = 10) {
        $this->negative = $i < 0;
        $this->base = $base;
        $i = abs($i);
        for (; $i > 0; $i = intval($i / $this->base)) {
            $this->digits[] = $i % $this->base;
        }
    }

    public static function fromString($x, $base = 10) {
        $self = new self(0, $base);

        if (substr($x, 0, 1) === "-") {
            $self->negative = true;
            $x = substr($x, 1);
        }

        for ($i = strlen($x) - 1; $i >= 0; --$i) {
            $self->digits[] = intval(substr($x, $i, 1));
        }
        return $self;
    }

    private static function makeZeroPaddingDigits($size) {
        return array_pad([], $size, 0);
    }

    public function negative() {
        return $this->negative;
    }

    public function figures() {
        return count($this->digits);
    }

    public function add(BigInteger $x) {
        if ($this->negative !== $x->negative) {
            return $this->subtract($x->negate());
        }

        $a = clone $this;
        $b = clone $x;
        if ($a->isSmaller($b) ^ $a->negative) {
            $t = $a;
            $a = $b;
            $b = $t;
        }

        for ($i = 0, $carry = 0; $i < $a->figures(); $i++) {
            $v = $i < $b->figures() ? $b->digits[$i] : 0;
            $u = $a->digits[$i] + $carry;
            $carry = intval(($u + $v) / $a->base);
            $a->digits[$i] = ($u + $v) % $a->base;
        }

        if ($carry > 0) {
            $a->digits[] = $carry;
        }

        return $a;
    }

    public function abs() {
        $result = clone $this;
        $result->negative = false;
        return $result;
    }

    public function negate() {
        $x = new BigInteger(0);
        $x->base = $this->base;
        $x->negative = !$this->negative;
        $x->digits = $this->digits;
        return $x;
    }

    public function min(BigInteger $x) {
        if ($this->isSmaller($x)) {
            return $this;
        }

        return $x;
    }

    public function max(BigInteger $x) {
        if ($this->isSmaller($x)) {
            return $x;
        }

        return $this;
    }

    public function pow($exponent) {
        $result = clone $this;
        if ($exponent === 0) {
            return new BigInteger(1);
        }

        for ($i = 0; $i < $exponent - 1; ++$i) {
            $result = $result->multiply($this);
        }

        return $exponent > 0 ? $result : (new BigInteger(1))->divide($result);
    }

    public function subtract(BigInteger $x) {
        if ($this->negative !== $x->negative) {
            return $this->add($x->negate());
        }

        $base = $this->base;
        $a = clone $this;
        $b = clone $x;
        if ($a->isSmaller($b) ^ $a->negative) {
            $t = $a;
            $a = $b;
            $b = $t;
            $a->negative = !$t->negative;
        }

        for ($i = 0, $borrow = 0; $i < $a->figures(); $i++) {
            $u = $a->digits[$i] + $borrow;
            $v = $i < $b->figures() ? $b->digits[$i] : 0;
            $a->digits[$i] = abs($base + $u - $v) % $base;
            $borrow = $u < $v ? -1 : 0;
        }

        $a->normalize();
        return $a;
    }

    public function multiply(BigInteger $x) {
        $result = new BigInteger(0);
        $result->base = $this->base;
        $result->negative = $this->negative !== $x->negative;
        $result->digits = self::makeZeroPaddingDigits($this->figures() + $x->figures() + 1);

        for ($i = 0; $i < $this->figures(); $i++) {
            $carry = 0;
            for ($j = 0; $j < $x->figures(); $j++) {
                $v = $this->digits[$i] * $x->digits[$j] + $result->digits[$i + $j] + $carry;
                $carry = intval($v / $this->base);
                $result->digits[$i + $j] = $v % $this->base;
            }

            if ($carry > 0) {
                $result->digits[$i + $x->figures()] += $carry;
            }
        }

        $result->normalize();
        return $result;
    }

    public function divide(BigInteger $x) {
        if ($this == $x) {
            return new BigInteger(1);
        }

        if ($x->figures() === 1) {
            return $this->divideBySingle($x);
        }

        return $this->divideByMultiple($x);
    }

    private function divideBySingle(BigInteger $x) {
        $a = clone $this;
        $d = $x->digits[0];
        $base = $this->base;

        for ($i = 0, $j = $a->figures() - 1, $r = 0; $j >= 0; --$j, ++$i) {
            $u = $r * $base + $this->digits[$j];
            $a->digits[$i] = intval($u / $d);
            $r = $u % $d;
        }

        $a->digits = array_reverse($a->digits);
        $a->normalize();
        return $a;
    }

    /**
     * The implementation of Knuth's Algorithm D.
     * @see http://www.geocities.jp/m_hiroi/func/yasp07.html
     * @see http://research.n-fukushi.ac.jp/ps/research/usr/db/pdfs/00070-00010.pdf
     */
    private function divideByMultiple(BigInteger $x) {
        if ($this == $x) {
            return new BigInteger(1);
        }

        $n = $x->figures();
        $m = $this->figures() - $n;
        $result = new BigInteger(0);
        $result->negative = $this->negative !== $x->negative;
        $result->base = $base = $this->base;
        $result->digits = self::makeZeroPaddingDigits($m);
        $d = intval($base / ($x->digits[$n - 1] + 1));
        $k = new BigInteger($d);
        $u = $this->negative ? $this->negate()->multiply($k) : $this->multiply($k);
        $v = $x->negative ? $x->negate()->multiply($k) : $x->multiply($k);
        // fills the figures of the divisor with 0 until it reaches that of the dividend.
        $v->fillDigitsWith($this, 0);

        for ($i = 0, $j = $m, $q = 0; $j >= 0; --$j, $i++) {
            $v1 = $v->digits[$v->figures() - 1];
            $v2 = $v->digits[$v->figures() - 2];
            $uj = array_key_exists($j + $n, $u->digits) ? $u->digits[$j + $n] : 0;
            $uj1 = array_key_exists($j + $n - 1, $u->digits) ? $u->digits[$j + $n - 1] : 0;
            $uj2 = array_key_exists($j + $n - 2, $u->digits) ? $u->digits[$j + $n - 2] : 0;
            if ($uj === $v1) {
                $q = $base - 1;
            } else {
                $q = intval(($uj * $base + $uj1) / $v1);
            }
            // If the divisor is bigger than the dividend,
            // decreases it by 1 until it becomes less than the dividend.
            while ($q >= $base ||  $q * $v2 > ($uj * $base + $uj1 - $q * $v1) * $base + $uj2) {
                --$q;
            }
            $u = $u->subtract($v->multiply(new BigInteger($q)));
            $result->digits[$i] = $q;
            // adjusts the figures of the divisor to prepare for the next computation.
            array_shift($v->digits);

            // If the result is a negative number, we add the divisor back to the result.
            if ($u->negative) {
                $result->digits[$i] -= 1;
                $u = $u->add($v);
            }
        }

        // we appends the framgments of quotient, so must reverse it.
        $result->digits = array_reverse($result->digits);
        $result->normalize();
        return $result;
    }

    public function compareTo(BigInteger $x) {
        if ($this->negative && !$x->negative) {
            return -1;
        }

        if (!$this->negative && $x->negative) {
            return 1;
        }

        if ($this->figures() !== $x->figures()) {
            if ($this->figures() > $x->figures()) {
                return $this->negative ? -1 : 1;
            } else {
                return $this->negative ? 1 : -1;
            }
        }

        for ($i = $this->figures() - 1; $i >= 0; --$i) {
            if ($this->digits[$i] > $x->digits[$i]) {
                return $this->negative ? -1 : 1;
            } elseif ($this->digits[$i] < $x->digits[$i]) {
                return $this->negative ? 1 : -1;
            }
        }

        return 0;
    }

    private function isSmaller(BigInteger $x) {
        return $this->compareTo($x) < 0;
    }

    public function equals(BigInteger $x) {
        if ($x instanceof BigInteger === false) {
            return false;
        }

        if ($this->negative !== $x->negative) {
            return false;
        }

        if (count($this->digits) !== count($x->digits)) {
            return false;
        }

        for ($i = 0; $i < count($this->digits); ++$i) {
            if ($this->digits[$i] !== $x->digits[$i]) {
                return false;
            }
        }

        return true;
    }

    public function toString() {
        if (count($this->digits) === 0) {
            return "0";
        }

        $result = "";

        if ($this->negative) {
            $result .= "-";
        }

        for ($i = count($this->digits) - 1; $i >= 0; --$i) {
            $result .= $this->digits[$i];
        }

        return $result;
    }

    private function normalize() {
        for ($i = $this->figures() - 1; $i >= 0; --$i) {
            if ($this->digits[$i] === 0) {
                array_pop($this->digits);
            } else {
                break;
            }
        }
        if ($this->figures() === 0) {
            $this->negative = false;
        }
    }


    private function fillDigitsWith(BigInteger $x, $value) {
        $n = $x->figures() - $this->figures();

        if ($n <= 0) {
            return;
        }

        $digits = $this->digits;
        $this->digits = self::makeZeroPaddingDigits($x->figures());

        for ($i = 0; $i < $x->figures(); $i++) {
            if ($i < $n) {
                $this->digits[$i] = $value;
            } else {
                $this->digits[$i] = $digits[$i - $n];
            }
        }
    }
}
