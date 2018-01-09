<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/26
 * Time: 上午9:54
 */

echo phpinfo();


$cars = array("leo","mark","jhon");
echo  "i like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
echo count($cars);
$arrlength = count($cars);
for ($x=0; $x<$arrlength;$x++){
    echo  $cars[$x];
    echo "<br>";

}
?>