<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/28
 * Time: 下午8:59
 */



$to = "love_ping891122@163.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "519773606@qq.com";
$headers = "From: $from";

mail($to,$subject,$message,$headers);
echo "Mail Sent.";

?>