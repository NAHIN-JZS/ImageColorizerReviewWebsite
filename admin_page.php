
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="styles/css/main.css">

</head>

<body>

  <?php
  // $uploads_dir = "generated_images/";
  session_start();
  if(!isset($_SESSION['login'])){
    header("Location: index.php");
    // echo $_SESSION['login'];
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "image_colorizer";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // ini_set('max_file_uploads', 300);

  ?>


  <?php

  //check if images are selected or not

  if (isset($_FILES['files'])) {
    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
      $file_name = $_FILES['files']['name'][$key];
      //   $file_size = $_FILES['files']['size'][$key];
      //   $file_type = $_FILES['files']['type'][$key];
      $file_temp = $_FILES['files']['tmp_name'][$key];
      $file_error = $_FILES['files']['error'][$key];


      if ($file_error == UPLOAD_ERR_OK) {
        if ($_POST['image_type'] == "gray_image") {
          $uploads_dir = "gray_scale_images/";
          $upload_path = $uploads_dir . basename($file_name);
          
          move_uploaded_file($file_temp, $upload_path);

          // $upload_path = $uploads_dir . basename($file_name);
          // $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`) VALUES ('$file_name', '$upload_path');";

        } elseif ($_POST['image_type'] == "gen_image") {
          $uploads_dir = "generated_images/";
          $upload_path = $uploads_dir . basename($file_name);
          $model_name = $_POST['model'];
          $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`, `model_name`) VALUES ('$file_name', '$upload_path', '$model_name');";

          mysqli_query($conn, $sql_enter_new_image);
          move_uploaded_file($file_temp, $upload_path);
        } elseif ($_POST['image_type'] == "tar_image") {
          $uploads_dir = "target_images/";
          $upload_path = $uploads_dir . basename($file_name);
          
          move_uploaded_file($file_temp, $upload_path);
        }

        // $upload_path = $uploads_dir . basename($file_name);
        // move_uploaded_file($file_temp, $upload_path);
        // Insert the file URL into the database

        // $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`) VALUES ('$file_name', '$upload_path');";

        // $sql = "INSERT INTO files (url) VALUES ('$file_url')";
        // mysqli_query($conn, $sql_enter_new_image);

        // echo "File uploaded successfully: " . $upload_path . "<br>";
      } else {
        echo "Error uploading file: " . $file_error . "<br>";
      }
    }
  }



  ?>
  <!-- 
<form action="add_image.php" method="post" enctype="multipart/form-data">
  <input type="file" name="files[]" multiple>
  <input type="submit" value="Upload">
</form> -->

  <?php
  // Replace table_name and column_name with your values
  $avg_of_avg_reviews = "SELECT AVG(`image_info`.`avg_review`) AS average FROM `image_info` WHERE `image_info`.`count` != 0;";

  if ($result = mysqli_query($conn, $avg_of_avg_reviews)) {
    $row = $result->fetch_assoc();
    $avg_rev = "The average review is " . $row['average'] . " out of 5";
    $avg_review = $row['average'];
    $result->free();
  }

  $avg_of_bayes_avg_reviews = "SELECT AVG(`image_info`.`bayes_avg_review`) AS bayes_average FROM `image_info` WHERE `image_info`.`count` != 0;";

  if ($result = mysqli_query($conn, $avg_of_bayes_avg_reviews)) {
    $row = $result->fetch_assoc();
    $avg_bayes_rev = "The bayes average review is " . $row['bayes_average'] . " out of 5";
    $result->free();
  }

  // mysqli_close($conn);
  ?>

<div class="feature">
        <div class="feature-image">
            <a href="index.php" class="btn btn-black">Back To Review</a>
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


  <section class="our-features">
    <div class="container">
      <div class="row">
        <div class="feature">
          <div class="feature-image"><img src="images/responsive.svg" alt="responsive"></div>

          <h3 class="feature-heading">Choose one or more images to upload.</h3>
          <div>
            <form action="admin_page.php" method="post" enctype="multipart/form-data">

              <h5>Image Type</h5>
              <input type="radio" name="image_type" value="gray_image"> Gray Scale Image<br>
              <input type="radio" name="image_type" value="gen_image"> Generated Image<br>
              <input type="radio" name="image_type" value="tar_image"> Target Image<br>

              <br>
              <h5>Model Name</h5>

              <input type="radio" name="model" value="uth_1"> UTH-1<br>
              <input type="radio" name="model" value="utr_2"> UTR-2<br>
              <input type="radio" name="model" value="rtr_3"> RTR-3<br>
              <input type="radio" name="model" value="utl_4"> UTL-4<br>
              <input type="radio" name="model" value="rtl_5"> RTL-5<br>
              <input type="radio" name="model" value="rtwl_6"> RTwL-6<br>
              <input type="radio" name="model" value="uty_7"> UTY-7<br>
              <input type="radio" name="model" value="utyc_8"> UTYc-8<br>
              <input type="radio" name="model" value="rtls"> RTLS<br>
              <input type="radio" name="model" value="rtlns"> RTLNS<br>
              <input type="radio" name="model" value="utls"> UTLS<br>
              <input type="radio" name="model" value="utlns"> UTLNS<br>


              <input type="file" name="files[]" multiple>
              <input type="submit" value="Upload">
            </form>
          </div>
          <!-- <p class="feature-text">Choose one or more images to upload.</p> -->
        </div>
        <div class="feature">
          <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
          <h3 class="feature-heading">Average Review <?php echo $avg_review; ?></h3>
          <p class="feature-text"> <?php echo $avg_rev; ?> </p>
        </div>

        <div class="feature">
          <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
          <h3 class="feature-heading">Bayes Average Review <?php echo $row['bayes_average']; ?></h3>
          <p class="feature-text"> <?php echo $avg_bayes_rev; ?> </p>
        </div>


        

        <!-- <div class="feature">
          <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
          <form method="post" action="admin_page.php">
            <label for="input_text">Enter Image Name:</label>
            <input type="text" name="input_image_name" id="input_image_name">
            <input type="submit" value="Submit">
          </form>
        </div> -->

        <!-- <div class="feature">
          <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
          <form method="post" action="admin_page.php">
            <label for="input_text">Show Databases?</label>
              <input type="radio" name="input_image_name" value="input_image_name"> Yes<br>
            <input type="submit" value="Submit">
          </form>
        </div> -->

        </div>


        <div class="row">

        <div class="feature">
          <div class="feature-image">
            <a href="index.php" class="btn btn-black">Review Page</a>
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
          <h3 class="feature-heading">Back to The Review Page</h3>
          <p class="feature-text"> Simply Tap the Button to Back to The Review Page </p>
        </div>


        <div class="feature">
          <div class="feature-image">
            <a href="summarize_image_info.php" class="btn btn-black">Show Database</a>
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
          <h3 class="feature-heading">Show Image Information</h3>
          <p class="feature-text"> Simply Tap the Button to Show Image Information</p>
        </div>

        <div class="feature">
          <div class="feature-image">
            <a href="summarize_user_info.php" class="btn btn-black">Show User Info</a>
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
          <h3 class="feature-heading">Show User Information</h3>
          <p class="feature-text"> Simply Tap the Button to Show User Information</p>
        </div>


      </div>
    </div>
  </section>


  <?php
  // check if particular image is selected or not
  // if (isset($_POST['input_image_name'])) {
  //   $selected_image_name = $_POST['input_image_name'];
  //   // echo $selected_image_name;
  //   // $sql_image_search = "SELECT * FROM `image_info` WHERE `image_info`.`image_name` == $selected_image_name;";
  //   $sql_image_search = "SELECT * FROM `image_info`;";

  //   // $new_data = mysqli_query($conn, $sql_image_search);
  //   if ($new_data = mysqli_query($conn, $sql_image_search)) {
  //     // foreach ($new_data as $key => $value) {
  //     //     $selected_image_id = $value['id'];
  //     //     $selected_image_path = $value['path'];
  //     //     $selected_review_sum = $value['review_sum'];
  //     //     $selected_count = $value['count'];
  //     //     $selected_avg_review = $value['avg_review'];
  //     //     $selected_bayes_review_sum = $value['bayes_review_sum'];
  //     //     $selected_bayes_avg_review = $value['bayes_avg_review'];


  //     //     // echo $new_image_path;
  //     // }
  //     // echo $selected_image_name;
  //     // echo "hereeeeeeeeeeeeeeeee";


  //     echo "    <style>";
  //     echo "    table {";
  //     echo "      border-collapse: collapse;";
  //     echo "      margin: 0 auto;";
  //     echo "    }";
  //     echo "    th, td {";
  //     echo "      padding: 10px;";
  //     echo "      border: 1px solid black;";
  //     echo "      text-align: center;";
  //     echo "    }";
  //     echo "  </style>";

  //     echo "<table>";
  //     echo "<thead>";
  //     echo "  <tr>";
  //     echo "    <th>ID</th>";
  //     echo "    <th>Image Name</th>";
  //     echo "    <th>Path</th>";
  //     echo "    <th>Count</th>";
  //     echo "    <th>Review Sum</th>";
  //     echo "    <th>Average Review</th>";
  //     echo "    <th> Bayes Review </th>";
  //     echo "    <th> Average Bayes Review</th>";
  //     echo "  </tr>";
  //     echo "</thead>";
  //     echo "<tbody>";


  //     // Loop over data and generate table rows
  //     foreach ($new_data as $key => $value) {
  //       echo '<tr>';
  //       echo '<td>' . $value['id'] . '</td>';
  //       echo '<td>' . $value['image_name'] . '</td>';
  //       echo '<td>' . $value['path'] . '</td>';
  //       echo '<td>' . $value['count'] . '</td>';
  //       echo '<td>' . $value['review_sum'] . '</td>';
  //       echo '<td>' . $value['avg_review'] . '</td>';
  //       echo '<td>' . $value['bayes_review_sum'] . '</td>';
  //       echo '<td>' . $value['bayes_avg_review'] . '</td>';
  //       // echo '<td>' . $value['path'] . '</td>';
  //       echo '</tr>';
  //     }

  //     echo "</tbody>";
  //     echo "</table>";
  //   } else {
  //     echo "404 Not Found!!! <br> Check File name <br>";
  //   }
  // }

  // mysqli_close($conn);
  ?>


</body>

</html>