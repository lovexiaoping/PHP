<?php


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
