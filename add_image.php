<?php

// // Set directory for uploaded files
// $upload_dir = "generated_images/";

// // Check if a file was uploaded
// if (isset($_FILES['file'])) {
    
//     // Get file name and URL
//     $file_name = $_FILES['file']['name'];
//     $file_url = $upload_dir . $file_name;
    
//     // Move the uploaded file to the specified directory
//     if (move_uploaded_file($_FILES['file']['tmp_name'], $file_url)) {
//         echo "File uploaded successfully!";
        
//         // Insert the file URL into the database
//         $servername = "localhost";
//         $username = "root";
//         $password = "";
//         $dbname = "image_colorizer";
//         $conn = mysqli_connect($servername, $username, $password, $dbname);
//         $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`) VALUES ('$file_name', '$file_url');";

//         // $sql = "INSERT INTO files (url) VALUES ('$file_url')";
//         mysqli_query($conn, $sql_enter_new_image);
//         mysqli_close($conn);
//     } else {
//         echo "Error uploading file!";
//     }
// }

// ?>

<!-- <form action="add_image.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photosnap - Home</title>
    <link rel="stylesheet" href="styles/css/main.css">
    
</head>
<body>

<?php
$uploads_dir = "generated_images/";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_colorizer";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<?php
if (isset($_FILES['files'])) {
foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
  $file_name = $_FILES['files']['name'][$key];
//   $file_size = $_FILES['files']['size'][$key];
//   $file_type = $_FILES['files']['type'][$key];
  $file_temp = $_FILES['files']['tmp_name'][$key];
  $file_error = $_FILES['files']['error'][$key];


  if ($file_error == UPLOAD_ERR_OK) {
    $upload_path = $uploads_dir . basename($file_name);
    move_uploaded_file($file_temp, $upload_path);
    // Insert the file URL into the database
        
        $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`) VALUES ('$file_name', '$upload_path');";

        // $sql = "INSERT INTO files (url) VALUES ('$file_url')";
        mysqli_query($conn, $sql_enter_new_image);
        
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

if ($result = mysqli_query($conn,$avg_of_avg_reviews)) {
    $row = $result->fetch_assoc();
    $avg_rev = "The average review is " . $row['average'] . " out of 5";
    $result->free();
}

mysqli_close($conn);
?>

<section class="our-features">
            <div class="container">
                <div class="row">
                    <div class="feature">
                        <div class="feature-image"><img src="images/responsive.svg" alt="responsive"></div>
                        
                        <h3 class="feature-heading">Choose one or more images to upload.</h3>
                        <div>
                        <form action="add_image.php" method="post" enctype="multipart/form-data">
                          <input type="file" name="files[]" multiple>
                          <input type="submit" value="Upload">
                        </form>
                        </div>
                        <!-- <p class="feature-text">Choose one or more images to upload.</p> -->
                    </div>
                    <div class="feature">
                        <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
                        <h3 class="feature-heading">Average Review <?php echo $row['average']; ?></h3>
                        <p class="feature-text"> <?php echo $avg_rev; ?> </p>
                    </div>
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
                                                  <path
                                                      d="M14.718.075l.707.707L8.707 7.5l6.718 6.718-.707.707L8 8.207l-6.718 6.718-.707-.707L7.293 7.5.575.782l.707-.707L8 6.793 14.718.075z"
                                                      fill-rule="evenodd"></path>
                                              </svg>
                            </button>
                                          
                      </div>
                        <h3 class="feature-heading">Back to The Review Page</h3>
                        <p class="feature-text"> Simply Tap the Button to Back to The Review Page                       </p>
                    </div>
                </div>
            </div>
        </section>



</body>
</html>