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
<?php
$uploads_dir = "generated_images/";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "image_colorizer";
$conn = mysqli_connect($servername, $username, $password, $dbname);

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

mysqli_close($conn);

?>

<form action="add_image.php" method="post" enctype="multipart/form-data">
  <input type="file" name="files[]" multiple>
  <input type="submit" value="Upload">
</form>