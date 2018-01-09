<?php
namespace BigInteger;

class BigDecimal {
    /**
     * @type BigInteger
     */
    private $value;

    /**
     * @type integer
     */
    private $precision;

    public function __construct(BigInteger $value, $precision) {
        $this->value = $value;
        $this->precision = $precision;
    }

    public function precision() {
        return $this->precision;
    }

    public function unscaledValue() {
        return $this->value;
    }

    public function negate() {
        return new BigDecimal($this->value->negate(), $this->precision);
    }

    public function add(BigDecimal $x) {
        if ($this->value->negative() !== $x->value->negative()) {
            return $this->subtract($x->negate());
        }

        $a = $this->value;
        $b = $x->value;
        $diff = $this->precision() - $x->precision();
        $precision = max($this->precision(), $x->precision());

        if ($diff > 0) {
            $b = $this->adjustFigures($b, $diff);
        } elseif ($diff < 0) {
            $a = $this->adjustFigures($a, -$diff);
        }

        $sum = $a->add($b);
        return new BigDecimal($sum, $precision);
    }

    public function subtract(BigDecimal $x) {
        if ($this->value->negative() !== $x->value->negative()) {
            return $this->add($x->negate());
        }

        $a = $this->value;
        $b = $x->value;
        $diff = $this->precision() - $x->precision();
        $precision = max($this->precision(), $x->precision());

        if ($diff > 0) {
            $b = $this->adjustFigures($b, $diff);
        } elseif ($diff < 0) {
            $a = $this->adjustFigures($a, -$diff);
        }

        $result = $a->subtract($b);
        return new BigDecimal($result, $precision);
    }

    public function multiply(BigDecimal $x) {
        $precision = $this->precision + $x->precision;
        $result = $this->value->multiply($x->value);
        return new BigDecimal($result, $precision);
    }

    private function adjustFigures(BigInteger $x, $precisionDiff) {
        if ($precisionDiff === 0) {
            return $x;
        }

        $t = "1";
        for ($i = 0; $i < $precisionDiff; ++$i) {
            $t .= "0";
        }

        return $x->multiply(BigInteger::fromString($t));
    }

    public function toString() {
        $result = $this->value->toString();
        $length = count($result);
        $integers = substr($result, 0, $length - $this->precision - 1);
        $points = substr($result, $length - $this->precision - 1);
        return implode(".", [$integers, $points]);
    }

    public static function fromString($number) {
        list($integers, $points) = preg_split("/\./", $number);
        return new BigDecimal(BigInteger::fromString($integers . $points), strlen($points));
    }
}
