<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/7/4
 * Time: 下午1:56
 */

class  session{
    const SESSION_STATTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;
    private  $session_state = self::SESSION_NOT_STARTED;
    private  static $instance;

    public static function get_instance(){
        if (!isset(self::$instance)){
            self::$instance = new self;
        }
        self::$instance->start_session();
        return self::$instance;
    }

    public function start_session(){
        if ($this->session_state == self::SESSION_NOT_STARTED){
            $this->session_state = $this->session_start();
        }
        return $this->session_state;
    }
    public function __set($name,$value){
        $_SESSION[$name] = $value;
    }

    public function __get($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }

    public function __isset($name){
        return isset($_SESSION[$name]);
    }

    public function __unsset($name){
        unset($_SESSION[$name]);
    }

    public function destroy(){
        if($this->session_state == self::SESSION_STARTED){
            $this->session_state = !session_destroy();
            unset($_SESSION);
            return !$this->session_state;
        }

        return false;
    }
}

?>