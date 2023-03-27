<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    
    // Save the review to the database or do something else with it
    
    // Display a message to the user with the rating value
    echo 'Thank you for submitting your review. Your rating is: ' . $rating;
}
?>
