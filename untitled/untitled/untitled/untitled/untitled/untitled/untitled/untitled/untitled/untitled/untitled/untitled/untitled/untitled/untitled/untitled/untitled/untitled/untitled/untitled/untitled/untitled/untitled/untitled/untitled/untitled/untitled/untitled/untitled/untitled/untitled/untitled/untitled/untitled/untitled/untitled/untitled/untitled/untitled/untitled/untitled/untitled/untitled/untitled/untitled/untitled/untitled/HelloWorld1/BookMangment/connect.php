<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/22
 * Time: 下午3:47
 */

header("Content-type: text/html; charset=utf-8");


require_once('config.php');

//连库
$Msql = mysqli_connect(constant("HOST"),USERNAME,PASSWORD);
if (mysqli_connect_errno()){
    echo "连接失败";

}
echo "连接成功";
echo '<br/>';

/*
-- 判断是否存在SAMPLEDB，若存在则DROP，否则CREATE
drop database if exists SAMPLEDB;
create database SAMPLEDB;
use SAMPLEDB;
-- 判断是否存在表CUSTOMERS、ORDERS，若存在则DROP，否则CREATE
drop table if exists CUSTOMERS;
drop table if exists ORDERS;
*/
//创建数据库yourdbname，并制定默认的字符集是utf8
//$strsqlTEMP1 = "CREATE DATABASE " . DATABASE . "DEFAULT CHARSET  utf8 COLLATE utf8_general_ci";

$strsql = "CREATE DATABASE if not exists " . DATABASE ;
echo $strsql;
echo '<br/>';

if ($Msql->query($strsql) === TRUE) {
    echo "Database created successfully";
    echo '<br/>';

} else {
    echo "数据库已经创建";
    echo '<br/>';

}



//选库

$Msql->select_db(DATABASE);
if (!$Msql){
    echo mysqli_error($Msql);
}
echo "数据库已选";
echo '<br/>';




//设置字符集

$sql0 = "set names utf8";
$Msql->query($sql0);
if (!$Msql){
    echo mysqli_error($Msql);
}
echo "字符集已设置";
echo '<br/>';

//$Msql->set_charset('utf8');

//
//$sql1="CREATE TABLE IF NOT EXISTS BooKMangmentACC ( username varchar(50) not null, password varchar(20) not null)";
//
//$Msql->query($sql1);

?>