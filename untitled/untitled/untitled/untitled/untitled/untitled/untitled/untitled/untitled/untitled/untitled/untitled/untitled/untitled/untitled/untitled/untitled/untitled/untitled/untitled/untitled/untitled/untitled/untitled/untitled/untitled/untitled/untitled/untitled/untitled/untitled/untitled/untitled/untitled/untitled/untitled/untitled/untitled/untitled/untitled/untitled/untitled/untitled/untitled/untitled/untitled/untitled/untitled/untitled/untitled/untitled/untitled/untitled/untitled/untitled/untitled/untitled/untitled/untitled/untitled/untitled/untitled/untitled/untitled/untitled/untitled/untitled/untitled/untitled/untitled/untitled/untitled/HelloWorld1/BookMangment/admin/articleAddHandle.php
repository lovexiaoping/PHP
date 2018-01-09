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

//$sql1="CREATE TABLE IF NOT EXISTS userInfo3 ( id int primary key auto_increment, name varchar(50) not null, password varchar(20) not null)";

//$sql1="CREATE TABLE IF NOT EXISTS BooKMangmentACC ( username varchar(50) not null, password varchar(20) not null)";


$sql1= "CREATE TABLE IF NOT EXISTS BOOKLIST (id int PRIMARY KEY auto_increment, bookName VARCHAR(50) not NULL , author varchar(10) NOT NULL , description varchar(200) )";







$Msql->query($sql1);

?>