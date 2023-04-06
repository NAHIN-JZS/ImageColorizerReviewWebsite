<?php

require 'con2database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_id = $_POST['image_id'];
    $rating = $_POST['rating'];
    $is_bayas = $_POST['is_bayas'];
    $old_image_rating = $_POST['old_image_rating'];
    // echo $is_bayas;

        if($is_bayas == 1){

        
        
            // Save the review to the database or do something else with it
            
            $sql_retive_current_image = "SELECT * FROM `image_info` WHERE `image_info`.`id` = '$image_id' ;";
            $data = mysqli_query($connect, $sql_retive_current_image);

            foreach ($data as $key => $value) {
                // $id = $value['id'];
                $review_sum = $value['review_sum'];
                $count = $value['count'];
                $avg_review = $value['avg_review'];
                $bayes_review_sum = $value['bayes_review_sum'];
                $bayes_avg_review = $value['bayes_avg_review'];
            }
                if($rating != "99"){
                    // echo $rating;
                    //check if it is skipped or not
                    
                    $update_count = $count + 1;

                    $update_review_sum = $review_sum + $old_image_rating;
                    $update_avg_review = $update_review_sum / $update_count;

                    $update_bayes_review_sum = $bayes_review_sum + $rating;
                    $update_bayes_avg_review = $update_bayes_review_sum / $update_count;

                    


                    // echo 'Thank you for submitting your review. Your rating is: ' . $rating."  ". $update_avg_review . "    " . $update_count . " ". $update_review_sum;
                    
                    $sql_update_rating = "UPDATE `image_info` SET `review_sum` = '$update_review_sum', `count`='$update_count', `avg_review`='$update_avg_review', `bayes_review_sum` = '$update_bayes_review_sum', `bayes_avg_review`='$update_bayes_avg_review' WHERE `image_info`.`id` = '$image_id';";
                    mysqli_query($connect, $sql_update_rating);


                    // Get the current value from the cookie (if it exists)
                $cookie_value = isset($_COOKIE['review_count']) ? $_COOKIE['review_count'] : 0;

                // Increment the value
                $cookie_value++;

                // Set the cookie with the new value
                setcookie('review_count', $cookie_value, time() + (86400 * 30)); // Set the cookie to expire in 30 days
                  
                // echo $_COOKIE['review_count'];

                }
                else{
                    // echo $rating;
                }
                
            
                
                  

            // $_POST['image_path'] = "images/running-free-m.jpg";

            $get_one_image_with_lowest_count = 'SELECT * FROM `image_info` WHERE `image_info`. `count` = (SELECT MIN(`image_info`. `count`) FROM `image_info`) LIMIT 1;';
            



            $new_data = mysqli_query($connect, $get_one_image_with_lowest_count);

            foreach ($new_data as $key => $value) {
                $new_image_id = $value['id'];
                $new_image_path = $value['path'];
                // $review_sum = $value['review_sum'];
                // $count = $value['count'];
                // $avg_review = $value['avg_review'];
                $new_image_name = $value['image_name'];
                // echo $new_image_name;
                // echo $new_image_path;
            }

            // $new_image_path = "images/running-free-m.jpg";
            // $new_image_id = "36";
            // $url = "index.php?image_path=" . urlencode($new_image_path) . "&new_image_id=" . urlencode($new_image_id);
            $is_bayas = 0;
            $url = "index.php?new_image_name=".urlencode($new_image_name)."&new_image_id=".urlencode($new_image_id)."&is_bayas=".urlencode($is_bayas);
            
        }

        else{
            $sql_retive_current_image = "SELECT * FROM `image_info` WHERE `image_info`.`id` = '$image_id' ;";
            $data = mysqli_query($connect, $sql_retive_current_image);

            foreach ($data as $key => $value) {
                // $id = $value['id'];
                $image_name = $value['image_name'];
            }

            $is_bayas = 1;
            $url = "index.php?new_image_name=".urlencode($image_name)."&new_image_id=".urlencode($image_id)."&old_image_rating=".urlencode($rating)."&is_bayas=".urlencode($is_bayas);
            
            // header("Location: " . $url);

        }


    header("Location: " . $url."#image_portion");
    // echo $_POST['image_path'];
    // echo $url;

    exit();
}
?>
