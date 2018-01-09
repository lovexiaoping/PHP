<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/26
 * Time: 下午2:37
 *
 *
 * 变量 $this 代表自身的对象。     PHP_EOL 为换行符。
 *
 *
 *
 *   类对象的使用  $php = new Site;
 *               $php->setTitle("中文网")
 */
class Site{
    //成员变量
    var $url;
    var $title;

//    构造函数

   function __construct($parm1,$parm2)
   {
       $this->url = $parm1;
       $this->title = $parm2;

   }
//   析构函数
    /**
     *
     */
    function __destruct()
   {
       print "销毁" . $this->name . "\n";

       // TODO: Implement __destruct() method.
   }


    //成员函数
    function setUrl($par){
        $this->url = $par;

    }

    function getUrl(){
        echo $this->url . PHP_EOL;
    }

}



$php =  new Site;
$php->setUrl("中文网");
$php->getUrl();


$php =new Site("sds","sdd");

$php->getUrl();


//继承 extends
class  chile extends Site{

    var $newbbb;

    function setCate($parm4){

        $this->newbbb = $parm4;
    }
    function getCate(){
        echo $this->newbbb . PHP_EOL;
    }



}


?>