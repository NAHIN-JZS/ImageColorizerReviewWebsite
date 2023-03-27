<?php

require 'con2database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    
    // Save the review to the database or do something else with it
    
    // Display a message to the user with the rating value
    echo 'Thank you for submitting your review. Your rating is: ' . $rating;
    // $_POST['image_path'] = "images/running-free-m.jpg";
    $image_path = "images/running-free-m.jpg";
    header("Location:index.php?image_path=$image_path");
    // echo $_POST['image_path'];
    exit();
}
?>
