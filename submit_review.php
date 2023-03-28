<?php

require 'con2database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];
    $rating = $_POST['rating'];
    
    // Save the review to the database or do something else with it
    
    $sql_retive_current_image = "SELECT * FROM `image_info` WHERE `image_info`.`id` = '$image_id' ;";
    $data = mysqli_query($connect, $sql_retive_current_image);

	foreach ($data as $key => $value) {
		// $id = $value['id'];
		$review_sum = $value['review_sum'];
		$count = $value['count'];
		$avg_review = $value['avg_review'];
	}
    $update_review_sum = $review_sum + $rating;
    $update_count = $count + 1;
    $update_avg_review = $update_review_sum / $update_count;
    // echo 'Thank you for submitting your review. Your rating is: ' . $rating."  ". $update_avg_review . "    " . $update_count . " ". $update_review_sum;
    
    $sql_update_rating = "UPDATE `image_info` SET `review_sum` = '$update_review_sum', `count`='$update_count', `avg_review`='$update_avg_review' WHERE `image_info`.`id` = '$image_id';";
    mysqli_query($connect, $sql_update_rating);
    
    
    // $_POST['image_path'] = "images/running-free-m.jpg";

    $get_one_image_with_lowest_count = 'SELECT * FROM `image_info` WHERE `image_info`. `count` = (SELECT MIN(`image_info`. `count`) FROM `image_info`) LIMIT 1;';
    
    $new_data = mysqli_query($connect, $get_one_image_with_lowest_count);

	foreach ($new_data as $key => $value) {
		$new_image_id = $value['id'];
        $new_image_path = $value['path'];
		// $review_sum = $value['review_sum'];
		// $count = $value['count'];
		// $avg_review = $value['avg_review'];
	}

    // $new_image_path = "images/running-free-m.jpg";
    // $new_image_id = "36";
    $url = "index.php?image_path=" . urlencode($new_image_path) . "&new_image_id=" . urlencode($new_image_id);
    header("Location: " . $url);
    // echo $_POST['image_path'];
    // echo $url;

    exit();
}
?>
