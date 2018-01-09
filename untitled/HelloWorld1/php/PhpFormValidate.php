<?php
/**
 * Created by PhpStorm.
 * User: dinglp
 * Date: 2017/6/26
 * Time: 下午2:14
 */


$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])){
        $nameErr = "name is required";

    } else {
        $name = test_input($_POST["name"]);
    }

}



function test_input($TString){


}

?>
