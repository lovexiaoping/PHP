<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/7/6
 * Time: 下午8:57
 */

header("Content-type:text/html;charset=utf-8");
function showLogInHtml($tag = ""){
    echo "<h1>   $tag      </h1><br/>";

}


$member = array("username","age");
var_dump($member);


$member_json =json_encode($member);//数组加密成json格式   json_decode:json格式解密成原有数据格式例如数组
var_dump($member_json);
showLogInHtml($member_json);

$array = array();
   $array = json_decode($member_json);
$array[0];
showLogInHtml($array[1]);

$member_serialize =  serialize($member);
var_dump($member_serialize);
showLogInHtml($member_serialize);


/**************************************/

$array_1 = array();
$array_2 = array();
$array_1[0] = "abc";
$array_1[1] = "a2222";

//$array_1['username'] = "abc";
//$array_1['psw'] = "1231abc";

$json11 = json_encode($array_1);

var_dump($array_1);
showLogInHtml($json11);




class  muke{
    public  $name = "public Name";
    protected $ptname = "protected name";
    private $pName = "pri name";

    public  function getName(){
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPName()
    {
        return $this->pName;
    }

    /**
     * @return string
     */
    public function getPtname()
    {
        return $this->ptname;
    }
}
//实例化
$mukeObj = new muke();
print_r($mukeObj);

$abc = json_encode($mukeObj);
showLogInHtml($abc);



$jsonStr = '{"key":"value","key1":"value1"}';
$json2Array = json_decode($jsonStr,true);
