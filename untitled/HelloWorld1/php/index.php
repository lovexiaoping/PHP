<?php
//echo是PHP中的输出语句，可以把字符串输出（字符串用双引号括起来）
echo 'hello world'.'abc';
echo 12*3;

// 变量是用于存储值的容器，如下 变量名必须通过$符号标识；
$var_name = @"shanghai";
$n = @"huannan";
echo $var_name;
echo "<br />";
echo $n;
echo "<br />";
$my_book = "这次奇迹的生还者";
echo $my_book;
echo "<br />";
// var_dump输出数据类型，
$string = "就是就是";
var_dump($string);
$string1 = 9494;
var_dump($string1);

$man = "男";
   $flag = ($man == "男");
   echo $flag ;
   echo "<br />" ;
   var_dump($flag);

//字符串很长
   $string1 = <<<GOD
我有一只小毛驴，我从来也不骑。
有一天我心血来潮，骑着去赶集。
我手里拿着小皮鞭，我心里正得意。
不知怎么哗啦啦啦啦，我摔了一身泥.
GOD;
echo $string1;
echo "<br />";

define("PI",3.14);
echo PI;
$r=3;
echo "面积为:".(PI*$r*$r)."<br />";
$shoesPrice = 49; //鞋子单价
 $shoesNum = 1; //鞋子数量
 $shoesMoney = $shoesPrice * $shoesNum;
 $shirtPrice = 99; //衬衣单价
 $shirtNum = 2; //衬衣数量
 $shirtMoney = $shirtPrice * $shirtNum;
 $orderMoney = $shoesMoney + $shirtMoney;
 echo $orderMoney ;

 echo "<br />";

 $fruit = array('apple'=>"苹果",'banana'=>"香蕉");
 $fruit0 = $fruit['banana'];
 print_r($fruit0);
 echo "<br />";

 foreach($fruit as $k=>$v){
     echo '<br>水果的英文键名：'.$k.'，对应的值是：'.$v;
 }
 echo "<br />";

function sum($a ,$b){
return $a+$b;
}
function add($a){
  return $a+1;
}
$d1 = sum(100,300);
$d2 = add(5);
echo $d1 ;
echo "<br />";
echo $d2 ;

//返回一个数组
function numbers() {
    return array(1, 2, 3);
}
list ($one, $two, $three) = numbers();

//创建一个类
class Car {
$namef = '汽车';
function getName(){
  return $this->namef;
}
$car = new Car();
echo $car->getName();
}
//创建一个对象
/**
 *
 */
 //定义一个类

 class Car {
   //定义属性

   public $name = '汽车';
   //定义方法

   public function getName(){
     //方法内部可以使用$this伪变量调用对象的属性或者方法

    return this->name;

   }
 }
 // 要创建一个类的实例，可以使用new关键字创建一个对象。
 $car = new Car();
 //也可以采用变量来创建
 $className = 'Car';
 $car = new $className();

// 类的属性
/*
public：公开的
protected：受保护的
private：私有的
*/

class CarBus {
  public $name = '汽车';
  protected $corlor = '白色';
  private $price = '1000';

//私有变量在内部是可以调用的
  public function getPrice(){
    return $this->price;
  }
}
$car = new CarBus();
echo $car->name;
echo $car->corlor;
echo $car->price;


// 构造函数和析构函数

// __construct()定义一个构造函数，具有构造函数的类，会在每次对象创建的时候调用该函数，因此常用来在对象创建的时候进行一些初始化工作。
class Person{
  function __construct(){
    print "构造函数被调用，一般在类和对象的初始化时候";
  }

}
$fiskjk = new Person();//实例化的时候
// 在子类中如果定义了construct则不会调用父类的construct，如果需要同时调用父类的构造函数，需要使用parent::construct()显式的调用。

class Father extends Person{
function __construct(){
  print "子类构造函数被调用";
  parent::__construct();//同时保证父类的构造函数也被调用
}

}
$renmin = new Father();


//PHP5支持析构函数，使用__destruct()进行定义，析构函数指的是当某个对象的所有引用被删除，或者对象被显式的销毁时会执行的函数。
// 当PHP代码执行完毕以后，会自动回收与销毁对象，因此一般情况下不需要显式的去销毁对象。
class GCar {
   function __construct() {
       print "构造函数被调用 \n";
   }
   function __destruct() {
       print "析构函数被调用 \n";
   }
}
$carv = new GCar(); //实例化时会调用构造函数
echo '使用后，准备销毁car对象 \n';
unset($carv); //销毁时会调用析构函数

// Static静态关键字

// 静态属性与方法可以在不实例化类的情况下调用，直接使用类名::方法名的方式进行调用。静态属性不允许对象使用->操作符调用。

class MMCar {
    private static $speed = 10;

    public static function getSpeed() {
        return self::$speed;
    }
}
echo MMCar::getSpeed();  //调用静态方法

//cookie



setcookie('test',time());
ob_start();
print_r($_COOKIE);
$content = ob_get_contents();
$content = str_replace(" ", '', $content);
ob_clean();
header("content_type:text/html; charset=utf-8");
echo '当前的Cookie为：<br>';
echo nl2br($content)









?>
