

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
echo '<p style="margin: 0 auto; text-align:center;"> <b>Image Name:</b> '.$_GET['selected_image_name'].'</p>';
$img_name = $_GET['selected_image_name'];

$src_img_path = 'gray_scale_images/'.$img_name;
$gen_img_path = 'generated_images/'.$img_name;
$tar_img_path = 'target_images/'.$img_name;

?>

<div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 5px; text-align:center;">

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

</body>
</html>