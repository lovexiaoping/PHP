<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/28
 * Time: 下午8:44
 */

//创建 cookie？
//setcookie() 函数用于设置 cookie。
//注释：setcookie() 函数必须位于 <html> 标签之前。
//在下面的例子中，我们将创建名为 "user" 的 cookie，把为它赋值 "Alex Porter"。我们也规定了此 cookie 在一小时后过期
setcookie("user","abcd",time()+3600);

//取回 Cookie
echo $_COOKIE["user"];
//打印所有cookie
print_r($_COOKIE);
//使用isset()来确认是否设置了cookie
if (isset($_COOKIE["user"])){
    echo "welcome" . $_COOKIE["user"] . "<br />";

}else{
    echo "welcom guest <br />";

}
//删除cookie
setcookie("user","",time()-3600);


?>

