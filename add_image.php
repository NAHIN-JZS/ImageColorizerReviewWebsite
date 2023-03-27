<?php

// Set directory for uploaded files
$upload_dir = "generated_images/";

// Check if a file was uploaded
if (isset($_FILES['file'])) {
    
    // Get file name and URL
    $file_name = $_FILES['file']['name'];
    $file_url = $upload_dir . $file_name;
    
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_url)) {
        echo "File uploaded successfully!";
        
        // Insert the file URL into the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "image_colorizer";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql_enter_new_image = "INSERT INTO `image_info` (`image_name`,`path`) VALUES ('$file_name', '$file_url');";

        // $sql = "INSERT INTO files (url) VALUES ('$file_url')";
        mysqli_query($conn, $sql_enter_new_image);
        mysqli_close($conn);
    } else {
        echo "Error uploading file!";
    }
}

?>

<form action="add_image.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
