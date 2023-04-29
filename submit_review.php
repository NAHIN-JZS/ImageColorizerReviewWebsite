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
                $all_review = $value['reviews'];
                $all_bayes_review = $value['bayes_review'];

            }


            //user part
            if(isset($_COOKIE['unique_id5'])){

                $cookie_id = $_COOKIE['unique_id5'];
            
                $sql_retive_current_user = "SELECT * FROM `user_info` WHERE `user_info`.`cookie_id` = '$cookie_id' ;";
                $user_data = mysqli_query($connect, $sql_retive_current_user);

                foreach ($user_data as $user_key => $user_value) {
                    // $id = $value['id'];
                    $user_review_sum = $user_value['review_sum'];
                    $user_count = $user_value['count'];
                    $user_avg_review = $value['avg_review'];
                    $user_bayes_review_sum = $user_value['bayes_review_sum'];
                    $user_bayes_avg_review = $value['avg_bayes_review'];
                    $user_all_review = $value['reviews'];
                    $user_all_bayes_review = $value['bayes_review'];
                }
            }


                if($rating != "99"){
                    // echo $rating;
                    //check if it is skipped or not
                    
                    $update_count = $count + 1;

                    $update_review_sum = $review_sum + $old_image_rating;
                    $update_avg_review = $update_review_sum / $update_count;

                    $update_bayes_review_sum = $bayes_review_sum + $rating;
                    $update_bayes_avg_review = $update_bayes_review_sum / $update_count;

                    if (empty($all_review)) {
                        $all_review_array = array();
                        $all_bayes_review_array = array();
                        if(isset($_COOKIE['unique_id5'])){

                            $user_all_review_array = array();
                            $user_all_bayes_review_array = array();
                        }
                        
                    }
                    else{
                        $all_review_array = unserialize($all_review);
                        $all_bayes_review_array = unserialize($all_bayes_review);
                        if(isset($_COOKIE['unique_id5'])){
                            $user_all_review_array = unserialize($user_all_review);
                            $user_all_bayes_review_array = unserialize($user_all_bayes_review);
                        }
                    }
                    // $all_review_array = unserialize($all_review);
                    // $all_bayes_review_array = unserialize($all_bayes_review);

                    array_push($all_review_array, $old_image_rating);
                    array_push($all_bayes_review_array, $rating);

                    $updated_all_review_array = serialize($all_review_array);
                    $updated_all_bayes_review_array = serialize($all_bayes_review_array);

                    if(isset($_COOKIE['unique_id5'])){

                        array_push($user_all_review_array, $old_image_rating);
                        array_push($user_all_bayes_review_array, $rating);

                        $updated_user_all_review_array = serialize($user_all_review_array);
                        $updated_user_all_bayes_review_array = serialize($user_all_bayes_review_array);

                    }


                    // echo 'Thank you for submitting your review. Your rating is: ' . $rating."  ". $update_avg_review . "    " . $update_count . " ". $update_review_sum;
                    
                    $sql_update_rating = "UPDATE `image_info` SET `review_sum` = '$update_review_sum', `count`='$update_count', `avg_review`='$update_avg_review', `bayes_review_sum` = '$update_bayes_review_sum', `bayes_avg_review`='$update_bayes_avg_review', `reviews`= '$updated_all_review_array', `bayes_review` = '$updated_all_bayes_review_array' WHERE `image_info`.`id` = '$image_id';";
                    mysqli_query($connect, $sql_update_rating);



                    //User part
                    if(isset($_COOKIE['unique_id5'])){

                        $update_user_count = $user_count + 1;

                        $update_user_review_sum = $user_review_sum + $old_image_rating;
                        $update_user_avg_review = $update_user_review_sum / $update_user_count;

                        $update_user_bayes_review_sum = $user_bayes_review_sum + $rating;
                        $update_user_bayes_avg_review = $update_user_bayes_review_sum / $update_user_count;

                        $sql_user_update_rating = "UPDATE `user_info` SET `review_sum` = '$update_user_review_sum', `avg_review`='$update_user_avg_review', `count`='$update_user_count', `bayes_review_sum` = '$update_user_bayes_review_sum', `avg_bayes_review`='$update_user_bayes_avg_review', `reviews`= '$updated_user_all_review_array', `bayes_review` = '$updated_user_all_bayes_review_array' WHERE `user_info`.`cookie_id` = '$cookie_id';";
                        mysqli_query($connect, $sql_user_update_rating);
                        echo $cookie_id .'\n';
                        echo $update_user_review_sum.'\n';
                        echo $update_user_bayes_review_sum.'\n';
                        echo $update_user_count.'\n';
                    }

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
                $new_all_review = $value['reviews'];
                $new_all_bayes_review = $value['bayes_review'];
            }

            $is_bayas = 1;
            $url = "index.php?new_image_name=".urlencode($image_name)."&new_image_id=".urlencode($image_id)."&old_image_rating=".urlencode($rating)."&is_bayas=".urlencode($is_bayas)."&all_review=".urlencode($new_all_review)."&all_bayes_review=".urlencode($new_all_bayes_review);
            
            // header("Location: " . $url);

        }


    header("Location: " . $url."#image_portion");
    // echo $_POST['image_path'];
    // echo $url;

    exit();
}
?>
