<?php
 //设置编码格式
header("Content-type: text/html; charset=utf-8");

$host = "localhost";
$root = "root";
$password = "123456";
$database = "student";




 //用mysqli来连接数据库（服务器，用户名，密码，数据库名字）
$mysqli=new mysqli($host,$root,$password,$database);
$mysqli->set_charset("utf8");
 if(mysqli_connect_errno()){
    echo "连接数据库失败：".mysqli_connect_error();
    $mysqli=null;
    exit;
 }
echo "连接数据库成功！<br/>";
 //获取MySQL编码
echo $mysqli->character_set_name()."<br/>";
 //获取客户端信息
echo $mysqli->get_client_info()."<br/>";
 //执行插入和删除，更新语句
 //$sql="insert into students (name,sex,age,tel) values('hello','man','25','13525654699')";
 //$sql="delete from students where id>5";
 $sql1="CREATE TABLE IF NOT EXISTS userInfo2 ( id int primary key auto_increment, name varchar(50) not null, password varchar(20) not null) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
 //执行sql语句
$result1=$mysqli->query($sql1);
var_dump($result1);
 //如果执行失败，则抛出错误
 if(!$result1){
    echo "sql1语句错误<br/>";
    echo "error:".$mysqli->error."|".$mysqli->error;
    exit;
 }


  for ($i=1; $i <100 ; $i++) {
    $pass = rand(9999,99999999);

    $sql2="insert  into userInfo2  values (0, '丁郎平', $pass)";

    # code...
    $result2=$mysqli->query($sql2);
    var_dump($result2);
     //如果执行失败，则抛出错误
     if(!$result2){
        echo "sql2语句错误<br/>";
        echo "error:".$mysqli->error."|".$mysqli->error;
        exit;
     }
  }

 //获取影响行数
echo "影响行数：".$mysqli->affected_rows."<br/>";
 if($mysqli->affected_rows>0){
    echo "执行成功，有行数被影响！<br/>";
 }
 //获取最后一个自增长ID
echo "最后自动增长的ID：".$mysqli->insert_id;

$mysqli->close();
 ?>
