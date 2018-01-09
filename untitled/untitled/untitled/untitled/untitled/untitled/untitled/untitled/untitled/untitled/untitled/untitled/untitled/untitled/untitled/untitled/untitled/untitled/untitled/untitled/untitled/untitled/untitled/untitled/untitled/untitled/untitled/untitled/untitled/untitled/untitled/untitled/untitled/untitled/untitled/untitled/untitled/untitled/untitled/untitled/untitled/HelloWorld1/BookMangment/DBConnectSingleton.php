<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/10/10
 * Time: 下午5:35
 */

class SQL_Db {

    private  static  $_instance;
    private  static  $_dbConnect;
    private  $_dbConfig = array(

        'HOST' => 'localhost',
        'USERNAME' => 'root',
        'PASSWORD' => '123456',
        'DATABASE' => 'BookData'
    );//保存配置信息



    //使用private 防止用户new
    private function __construct(){

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

    public  function getDB()
    {
        return self::$_dbConnect;
    }

        public function DBconnect(){

        self::$_dbConnect = @mysqli_connect($this->_dbConfig['HOST'],
        $this->_dbConfig['USERNAME'],$this->_dbConfig['PASSWORD']);

        if (!self::$_dbConnect){

          throw new Exception("mysql connect error".mysqli_error());
        }
            $sql0 = "set names utf8";

            self::$_dbConnect->query($sql0);
            self::$_dbConnect->select_db($this->_dbConfig['DATABASE']);

            return self::$_dbConnect;

        }

}
$a = SQL_Db::getInstance();

try{

}catch (Exception $e){
    echo "sorry, error was happend.".$e->getMessage();
}


