<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/10/10
 * Time: 下午5:35
 */

class Db {

    private  static  $_instance;
    private  static  $_dbConnect;
    private  $_dbConfig = array(

        'HOST' => 'localhost',
        'USERNAME' => 'root',
        'PASSWORD' => '123456',
        'DATABASE' => 'BookData'
    );//保存配置信息
    //使用private 防止用户new
    private function __construct{

    }
    //重写clone 防止用户clone
    public function __clone()
    {
        // TODO: Implement __clone() method.
        trigger_error("can not clone object",E_USER_ERROR);


    }
    //有类的自身进行实例化
    public static  function getInstance(){
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();

        }
        return self::$_instance;
    }
    public function connect(){

        self::$_dbConnect = @mysqli_connect($this->_dbConfig['HOST'],
        $this->_dbConfig['USERNAME'],$this->_dbConfig['PASSWORD']);
        


    }




















}