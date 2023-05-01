

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="styles/css/main.css">

</head>

<body>

<div class="row">
    <div class="feature">
        <div class="feature-image">
            <a href="admin_page.php" class="btn btn-black">Back To Admin</a>
            <button class="menu_toggle">
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

    <div class="feature">
        <div class="feature-image">
            <a href="database_show.php" class="btn btn-black">Back to Full Image Info</a>
            <button class="menu_toggle" >
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

</div>

<?php

require 'con2database.php';

function median($arr) {
    sort($arr);
    $count = count($arr);
    $mid = floor(($count-1)/2);
    if($count % 2) {
        return $arr[$mid];
    } else {
        return ($arr[$mid] + $arr[$mid+1])/2;
    }
}

function calculateStatistics($numbers) {
    $total = array_sum($numbers);
    // echo $total;
    $count = count($numbers);
    $average = $total / $count;
    $variance = 0;
    foreach ($numbers as $num) {
      $variance = $variance + pow($num - $average, 2);
    }
    $variance = $variance / $count;
    $stdDeviation = sqrt($variance);
  
    return array($total, $count, $average, $variance, $stdDeviation);
  }
  

$image_id = $_GET['selected_image_id'];

$sql_img_search = "SELECT * FROM `image_info` WHERE `image_info`.`id` = '$image_id' ;";
$data = mysqli_query($connect, $sql_img_search);

            foreach ($data as $key => $value) {
                $img_id = $value['id'];
                $img_name = $value['image_name'];
                $review_sum = $value['review_sum'];
                $count = $value['count'];
                $avg_review = $value['avg_review'];
                $bayes_review_sum = $value['bayes_review_sum'];
                $bayes_avg_review = $value['bayes_avg_review'];
                $all_review = $value['reviews'];
                $all_bayes_review = $value['bayes_review'];
                $model_name = $value['model_name'];
                $count = $value['count'];
                

            }
$src_img_path = 'gray_scale_images/'.$img_name;
$gen_img_path = 'generated_images/'.$img_name;
$tar_img_path = 'target_images/'.$img_name;

echo '<p style="margin: 0 auto; text-align:center;"> <b>Image Name:</b> '.$img_name.'</p>';


?>

<div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 25px; text-align:center;">

                    <!-- <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" > -->
                    <!-- <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" > -->
                    
                    <div style = "display: inline-block; text-align: center;">
                    <figure>
                    <img src = <?php echo $src_img_path; ?> style="width: 100%; max-width: 200px; height: 100%; max-height: 200px;" >
                    <figcaption>Black and White Image</figcaption>
                    </figure>
                    </div>
                    
                    <div style = "display: inline-block; text-align: center;">
                    <figure>
                    <img src = <?php echo $gen_img_path; ?> style="width: 100%; max-width: 200px; height: 100%; max-height: 200px;" >
                    <figcaption>Generated Image</figcaption>
                    </figure>
                    </div>

                    <div style = "display: inline-block; text-align: center;">
                    <figure>
                    <img src = <?php echo $tar_img_path; ?> style="width: 100%; max-width: 200px; height: 100%; max-height: 200px;" >
                    <figcaption>Original Color Image</figcaption>
                    </figure>
                    </div>
                    

                </div>
            <!-- <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 5px; text-align:center;">
                <p><b>Average Review:</b>   <?php echo $avg_review ?> </p>
                <p><b>Average Conditional Review:</b>   <?php echo $bayes_avg_review ?> </p>

            </div> -->


            <div>
            <?php
            
        echo "    <style>";
        echo "    table {";
        echo "      border-collapse: collapse;";
        echo "      margin: 0 auto;";
        echo "    }";
        echo "    th, td {";
        echo "      padding: 10px;";
        echo "      border: 1px solid black;";
        echo "      text-align: center;";
        echo "    }";
        echo "  </style>";


                    echo "<table>";
                    echo "<thead>";
                    echo "  <tr>";
                    echo "    <th>ID</th>";
                    echo "    <th>Image Name</th>";
                    echo "    <th>Model Name</th>";
                    echo "    <th>Count</th>";
                    echo "    <th>Total Review</th>";
                    echo "    <th>Total Conditional Review </th>";
                    echo "    <th>Average Review</th>";
                    echo "    <th> Average Conditional Review</th>";
                    echo "    <th> Median Review</th>";
                    echo "    <th> Median Conditional Review</th>";
                    echo "    <th> Veriance</th>";
                    echo "    <th> Conditional Veriance</th>";
                    echo "    <th> SD </th>";
                    echo "    <th> Conditional SD</th>";
                    echo "  </tr>";
                    echo "</thead>";

            echo "<tbody>";

            echo '<tr>';
            echo '<td>' . $img_id . '</td>';
            echo '<td>' . $img_name . '</td>';
            echo '<td>' . $model_name . '</td>';
            echo '<td>' . $count . '</td>';
            echo '<td>' . $review_sum . '</td>';
            echo '<td>' . $bayes_review_sum . '</td>';
            echo '<td>' . $avg_review . '</td>';
            echo '<td>' . $bayes_avg_review . '</td>';

            $all_review_array = unserialize($all_review);
            $all_bayes_review_array = unserialize($all_bayes_review);
            $review_median = median($all_review_array);
            $bayes_review_median = median($all_bayes_review_array);

            $review_stats = calculateStatistics($all_review_array);
            list($total, $count, $average, $variance, $stdDeviation) = $review_stats;

            // $stdDeviation = calculateStatistics($all_review_array);
            // list($total, $count, $average, $variance, $stdDeviation) = $review_stats;

            $review_bayes_stats = calculateStatistics($all_bayes_review_array);
            list($total_bayes, $count_bayes, $average_bayes, $variance_bayes, $stdDeviation_bayes) = $review_bayes_stats;
            
            // echo '<td>' . $review_median . '</td>';
            echo '<td>' . $review_median . '</td>';
            echo '<td>' . $bayes_review_median . '</td>';
            
            echo '<td>' . $variance . '</td>';
            echo '<td>' . $variance_bayes . '</td>';
            
            echo '<td>' . $stdDeviation . '</td>';
            echo '<td>' . $stdDeviation_bayes . '</td>';
            // echo '<td>' . $value['path'] . '</td>';
            echo '</tr>';
        

        echo "</tbody>";
        echo "</table>";
            ?>
        
            </div>


    <div class="row" style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 25px; text-align:center;">
    <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 25px; text-align:center;">
        <div class="feature-image">
           <?php 
           
           $previous_image_id = $value['id'] - 1;
           //check if it is the first image or not
           if($previous_image_id < 1){
            $previous_image_id = $value['id'];
           }
           echo '<a href="selected_image_show.php?selected_image_id='. $previous_image_id.'" class="btn btn-black">Previous</a>' 
           ?>
            <button class="menu_toggle">
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

    <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 25px; text-align:center;">
        <div class="feature-image">
            <?php 
           $next_image_id = $value['id']+1;

           //check if it is the last image or not
           if($next_image_id > 3){
            $next_image_id = $value['id'];
           }

           echo '<a href="selected_image_show.php?selected_image_id='. $next_image_id.'" class="btn btn-black">Next</a>' 
           ?>
            <button class="menu_toggle" >
                <svg height="6" width="20" xmlns="http://www.w3.org/2000/svg" class="open">
                    <g fill-rule="evenodd">
                        <path d="M0 0h20v1H0zM0 5h20v1H0z"></path>
                    </g>
                </svg>
                <svg height="15" width="16" xmlns="http://www.w3.org/2000/svg" class="close">
                    <path d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z" fill-rule="evenodd"></path>
                </svg>
            </button>

        </div>
    </div>

</div>



            
</body>
</html>