<?php
setcookie('unique_id5', uniqid(), time() + 360);
// echo "3";
header('location:index.php');
?>