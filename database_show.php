<?php
// $uploads_dir = "generated_images/";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "image_colorizer";
// $conn = mysqli_connect($servername, $username, $password, $dbname);

require 'con2database.php';


// ini_set('max_file_uploads', 300);

?>
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
            <a href="summarize_image_info.php" class="btn btn-black">View Review Summary</a>
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
      
    //   function Stand_Deviation($arr)
    //   {
    //       $num_of_elements = count($arr);
  
    //       $variance = 0.0;
  
    //               // calculating mean using array_sum() method
    //       $average = array_sum($arr)/$num_of_elements;
  
    //       foreach($arr as $i)
    //       {
    //           // sum of squares of differences between 
    //                       // all numbers and means.
    //           $variance += pow(($i - $average), 2);
    //       }
  
    //       return (float)sqrt($variance/$num_of_elements);
    //   }

    // check if particular image is selected or not
    // require 'con2database.php';
    // if(isset($_POST['database_show'])) {
    // $selected_image_name = $_POST['input_image_name'];
    // $sql_image_search = "SELECT * FROM `image_info` WHERE `image_info`.`image_name` == $selected_image_name;";
    $sql_image_search = "SELECT * FROM `image_info`;";

    // $new_data = mysqli_query($conn, $sql_image_search);
    if ($new_data = mysqli_query($connect, $sql_image_search)) {
        // foreach ($new_data as $key => $value) {
        //     $selected_image_id = $value['id'];
        //     $selected_image_path = $value['path'];
        //     $selected_review_sum = $value['review_sum'];
        //     $selected_count = $value['count'];
        //     $selected_avg_review = $value['avg_review'];
        //     $selected_bayes_review_sum = $value['bayes_review_sum'];
        //     $selected_bayes_avg_review = $value['bayes_avg_review'];


        //     // echo $new_image_path;
        // }
        // echo $selected_image_name;
        // echo "hereeeeeeeeeeeeeeeee";



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
        echo "    <th>Review Sum</th>";
        echo "    <th>Average Review</th>";
        echo "    <th> Conditional Review </th>";
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


        // Loop over data and generate table rows
        foreach ($new_data as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id'] . '</td>';
            echo '<td><a href="selected_image_show.php?selected_image_name='.$value['image_name'] .'">' . $value['image_name'] . '</a></td>';
            echo '<td>' . $value['model_name'] . '</td>';
            echo '<td>' . $value['count'] . '</td>';
            echo '<td>' . $value['review_sum'] . '</td>';
            echo '<td>' . $value['avg_review'] . '</td>';
            echo '<td>' . $value['bayes_review_sum'] . '</td>';
            echo '<td>' . $value['bayes_avg_review'] . '</td>';

            $all_review_array = unserialize($value['reviews']);
            $all_bayes_review_array = unserialize($value['bayes_review']);
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
            
            echo '<td>' . $total . '</td>';
            echo '<td>' . $total_bayes . '</td>';
            
            echo '<td>' . $stdDeviation . '</td>';
            echo '<td>' . $stdDeviation_bayes . '</td>';
            // echo '<td>' . $value['path'] . '</td>';
            echo '</tr>';
        }

        echo "</tbody>";
        echo "</table>";

        mysqli_close($connect);


        // //   }
        //   else {
        //     echo "404 Not Found!!! <br> Check File name <br>";
        //   }
    }
    ?>


</body>

</html>