<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/28
 * Time: 下午7:51
 */

require_once('./Cookie.php');
require_once('../php/phpnameSpace.php');
require_once('../../helloWorld.php');
require_once('../../../untitled/helloWorld.php');
//echo readfile("a.txt");
////r 为只读
//$myfile = fopen("a.txt","r") or die("unable to open file");
//echo fread($myfile,filesize("web.txt"));
//fclose($myfile);

//创建文件
$myfile = fopen("textfile.txt","w");
$txt = "bill gets \n";
fwrite($myfile,$txt);
$txt = "abcde";
fwrite($myfile,$txt);


fclose($myfile);
//读取文件
$myfile = fopen("textfile.txt","r") or die("unable to open file");
echo fread($myfile,filesize("textfile.txt"));
fclose($myfile);


?>

//创建上传脚本
<?php
if ($_FILES["file"]["error"]>0) {
    echo "error :" . $_FILES["file"]["error"] . "<br />";
}else{

    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type:" . $_FILES["file"]["type"] . "<br />";
    echo "Size:" . ($_FILES["file"]["size"]/1024) . "kb<br />";
    echo "Stored in : " .$_FILES["file"]["tmp_name"];

}




?>

<!--当前文件所在目录引用方法为：-->
<?php
//include('test.php');
//?>
<!--或者：-->
<?php
//include('./test.php');
//?>
<!--上级目录引用方法：-->
<?php
//include('../test.php');
//?>
<!--上上级引用方法：-->
<?php
//include('../../test.php');
//?>
