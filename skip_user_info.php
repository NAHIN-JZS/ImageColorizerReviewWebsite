<?php
require 'con2database.php';

if(isset($_GET['age'])){
    $uAge = $_COOKIE['age'];
    $comPro = $_COOKIE['cp'];
    $c_id = $_COOKIE['unique_id5'];
    $gender = $_COOKIE['gender'];
    $sql_enter_new_user_info = "INSERT INTO `user_info` (`cookie_id`,`age`,`cp`,`gender`) VALUES ('$c_id', '$uAge', '$comPro','$gender');";
    mysqli_query($connect, $sql_enter_new_user_info);
    echo $c_id;
}
else{
    setcookie('not_interested', uniqid(), time() + 36);
}
// echo "3";
header('location:index.php');


?>