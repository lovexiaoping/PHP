<?php
$host = "localhost";
$root = "root";
$password = "123456";
$database = "dlp_database";



if (function_exists('mysqli_connect')) {
  echo "mysqli_connect扩展已经安装";
  # code...
}else {
  echo "! mysqli_connect扩展已经安装";

}
 $link = mysqli_connect($host,$root,$password);
 if (!$link) {
   die("数据库连接失败！".mysql_error);
 }else {
   echo "数据库连接成功";

 }
 //获取MySQL编码
 echo $mysqli->character_set_name()."<br/>";
  //获取客户端信息
 echo $mysqli->get_client_info()."<br/>";

//php7 sql 问题？
// $conn = mysql_connect($host,$root,$password);//连接数据库
//
// if (!$conn) {
//   die("数据库连接失败！".mysql_error());
// }else {
//   echo "数据库连接成功";
//
// }
// mysql_select_db($database,$conn);//选择数据库
//     mysql_query("set names utf-8");//设置编码为utf-8
 ?>
