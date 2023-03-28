<?php

// Set directory for uploaded files
$upload_dir = "test_images/";

// Check if a file was uploaded
if (isset($_FILES['file'])) {
    
    // Get file name and URL
    $file_name = $_FILES['file']['name'];
    $file_url = $upload_dir . $file_name;
    
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_url)) {
        echo "File uploaded successfully!";

        $image_data = file_get_contents($file_url);

        // Encode the image data in base64 format
        $image_data_base64 = base64_encode($image_data);

        // Call the Python script with the encoded image data as a command-line argument
        // $command = "python image_conversion.py '$image_data_base64'";
        $command = "python image_conversion.py";
        $output = shell_exec($command);

        // Decode the output from the Python script
        $output_decoded = base64_decode($output);

                
        // Set the content-type header to tell the browser that this is an image
        header('Content-Type: image/png');

        // Load the image from a file or a database
        $image = imagecreatefrompng('temporary_image.png');

        // Output the image to the browser
        imagepng($image);

        // Free up memory by destroying the image resource
        imagedestroy($image);



        
    } else {
        echo "Error uploading file!";
    }
}

?>

<form action="convert_an_image.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>