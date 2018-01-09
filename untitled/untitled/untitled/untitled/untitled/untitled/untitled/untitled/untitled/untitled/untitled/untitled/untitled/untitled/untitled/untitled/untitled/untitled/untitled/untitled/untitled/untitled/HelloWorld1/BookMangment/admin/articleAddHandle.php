<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/22
 * Time: 下午3:49
 */
header("Content-type: text/html; charset=utf-8");

require_once('../connect.php');
require_once('../articleShow.php');
require_once('../../AJAX/ajax1.html');
require_once('../../../HelloWorld1/H5/VideoH.html');
require_once('../../../index.php');
require_once('../DBConnectSingleton.php');


print_r($_GET);

$shopname = $_GET['shopname'];
$author = $_GET['author'];
$description = $_GET['des'];

echo $shopname;
echo '<br/>';
echo $author;
echo '<br/>';
echo $description;
echo "---------------------";

//$sql1="CREATE TABLE IF NOT EXISTS userInfo3 ( id int primary key auto_increment, name varchar(50) not null, password varchar(20) not null)";

//$sql1="CREATE TABLE IF NOT EXISTS BooKMangmentACC ( username varchar(50) not null, password varchar(20) not null)";

$a = SQL_Db::getInstance();

try{


}catch (Exception $e){
    echo "sorry, error was happend.".$e->getMessage();
}

$result2 = $a->REDBconnect();
echo "-------------====------------";
if(!$result2){
    echo "错误<br/>";

}
$myDb = $a->getDB();
$sql1= "CREATE TABLE IF NOT EXISTS BOOKLIST (id int PRIMARY KEY auto_increment, bookName VARCHAR(50) not NULL , author varchar(10) NOT NULL , description varchar(200) )";
$result2 = $myDb->query($sql1);

if(!$result2){
    echo "sql2语句错误<br/>";
    echo "error:".$mysqli->error."|".$mysqli->error;
    exit;
}
$sql2="insert into BOOKLIST VALUES(NULL ,$shopname,$author,$description)";
$myDb->query($sql2);
$sql3="select 1 from BOOKLIST WHERE bookName = {$shopname} limit 1";
$myDb->query($sql3);

?>