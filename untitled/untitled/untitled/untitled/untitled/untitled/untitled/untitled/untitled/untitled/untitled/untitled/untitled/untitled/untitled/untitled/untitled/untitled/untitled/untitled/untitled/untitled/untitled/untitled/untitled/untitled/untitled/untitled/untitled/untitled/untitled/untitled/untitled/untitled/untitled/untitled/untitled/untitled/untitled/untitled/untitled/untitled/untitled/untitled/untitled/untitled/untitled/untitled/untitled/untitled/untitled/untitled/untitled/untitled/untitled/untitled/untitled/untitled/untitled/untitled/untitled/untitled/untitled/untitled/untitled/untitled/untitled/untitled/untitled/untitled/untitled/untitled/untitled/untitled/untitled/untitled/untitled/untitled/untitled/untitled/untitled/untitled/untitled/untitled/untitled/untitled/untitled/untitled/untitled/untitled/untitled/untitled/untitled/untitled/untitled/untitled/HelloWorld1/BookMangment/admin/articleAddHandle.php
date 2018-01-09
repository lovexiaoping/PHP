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



print_r($_GET);

$shopname = $_GET['shopname'];
$author = $_GET['author'];
$description = $_GET['des'];

echo $shopname;
echo '<br/>';
echo $author;
echo '<br/>';
echo $description;


$sql1="CREATE TABLE IF NOT EXISTS BooKMangmentACC ( username varchar(50) not null, password varchar(20) not null)";

$Msql->query($sql1);

?>