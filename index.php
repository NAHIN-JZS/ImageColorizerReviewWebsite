


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Colorizer</title>
    <link rel="stylesheet" href="styles/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php

    // start the session
    session_start();

    if(isset($_SESSION['login'])){
        // echo $_SESSION['login'];
        unset($_SESSION['login']);
        session_destroy();

        // echo $_SESSION['login'];
    }
// echo "<script>alert('You have reviewed ".$_COOKIE['review_count']." images. Thankyou!!! 
// We have a lot more images to reviewed. You can help us more further.');</script>";
// echo "<script>alert('Your message goes here.');</script>";

    $i_b = isset($_GET["is_bayas"]) ? $_GET["is_bayas"] : 1;
    // $i_b = $_GET["is_bayas"];

    // prompt for count message
        // if (isset($_COOKIE['review_count']) && $i_b != 1){
        //     // echo $_COOKIE['review_count'];
        //     // echo "<script>alert('Your message goes here2.');</script>";
        //     $user_review_count = $_COOKIE['review_count'];
        //     if( $user_review_count % 10 == 0 ){
        //         // echo $user_review_count;
        //         // $random_number = 2;
        //         // echo "<script>alert('The value of the cookie is even: $random_number');</script>";
        //         echo "<script>alert('You have reviewed $user_review_count images. Thankyou!!! We have a lot more images to review. You can help us more.');</script>";

        //     }
        // }
?>

	<script>
		$(document).ready(function() {
			$('.rating-star').on('mouseenter', function() {
				var rating = $(this).data('rating');
				// for (var i = 1; i <= rating; i++) {
				// 	$('.rating-star[data-rating="'+i+'"]').addClass('active');
				// }
			}).on('mouseleave', function() {
				$('.rating-star').removeClass('active');
			}).on('click', function() {
				var rating = $(this).data('rating');
				$('#rating').val(rating);
				$('.rating-star').removeClass('active');
				// for (var i = 1; i <= rating; i++) {
				// 	$('.rating-star[data-rating="'+i+'"]').addClass('active');
				// }
				$('form').submit();
			});
		});

        
	</script>
	<style>
		.rating-star {
			display: inline-block;
			font-size: 24px;
			/* color: #ccc; */
			color: #1E90FF;
			cursor: pointer;
			margin-right: 25px;
		}

		.rating-star:hover,
		.rating-star.active {
			/* color: #ffbf00; */
			color: #FF6347 ;
		}

        .btn.btn-red {
            background-color: red;
            color: white;
        }

        .btn.btn-red:hover {
            background-color: #f5f5f5;
            color: red;
        }
	</style>
    
</head>



<body>



<?php
require 'con2database.php';

if (!isset($_COOKIE['not_interested'])){

    if (!isset($_COOKIE['unique_id5'])) {
    // This is a new user
    header("Location: user_info.php");
    //   header('user_info.php');
    //   setcookie('unique_ide', uniqid(), time() + 360);
    } else {
    // This is a returning user
    //   echo "here".$_COOKIE['unique_id5'];
    }
}
// if (isset($_COOKIE['review_count'])){
//     // echo $_COOKIE['review_count'];
//     $user_review_count = $_COOKIE['review_count'];
//     if( $user_review_count % 2 == 0 ){
//         // echo $user_review_count;
//         echo "<script>alert('You have reviewed ".$_COOKIE['review_count']." images. Thankyou!!! 
//         We have a lot more images to reviewed. You can help us more further.');</script>";

//     }
// }

?>
    <!-- HEADER -->
    <header>
        
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">
                    <!-- <img src="images/logo.svg" alt="logo"> -->
                    <img src="images/nahin_black.svg" alt="logo" height="150" width="150">
                </a>

                <div class="row">
                <!-- <a href="add_image.php" class="btn btn-black">Convert an Image</a> -->
                <!-- <a href="login.php" class="btn btn-black">Admin</a>

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
                </button> -->

                <a href="close.php" class="btn btn-red">Exit</a>

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
            </nav>
        </div>
        
        </div>
    </header>


    <!-- MAIN -->
    <main>



        <!-- GALLERY SECTION -->
                <!-- <div class="section_text-box"> -->
                <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 0 55px;">
                                    <h2>Image Colorizer</h2>
                                    <p class="opaque-black">Thank you for taking the time to review the output of our model-generated color photo.
                                         The model has attempted to colorize a black and white photo, and we would appreciate your feedback on how realistic it looks. We have included some AI-generated color photos below for reference.
                                         Please use the scale of (-3 to 3) to rate the photo, with 3 being the most realistic and (-3) being not realistic at all. Thank you for your help!
                                    </p>
                </div>

                <!-- <div style = "width: 700px; margin: 0 auto;"> -->
                <div style = "width: 100%; max-width: 800px;  margin: 0 auto; padding: 55px 55px;">


                <?php
                // if(!isset($_GET["image_path"])){
                    if(!isset($_GET["new_image_name"])){
                    // $img_path = "images/18-days-voyage-m.jpg";
                    // $image_id = 40;

                    $get_one_image_with_lowest_count = 'SELECT * FROM `image_info` WHERE `image_info`. `count` = (SELECT MIN(`image_info`. `count`) FROM `image_info`) LIMIT 1;';
    
                    $new_data = mysqli_query($connect, $get_one_image_with_lowest_count);

                    foreach ($new_data as $key => $value) {
                        $image_id = $value['id'];
                        // $img_path = $value['path'];
                        $img_name = $value['image_name'];
                        $src_img_path = 'gray_scale_images/'.$img_name;
                        $gen_img_path = 'generated_images/'.$img_name;
                        $tar_img_path = 'target_images/'.$img_name;
                        $is_bayas = 0;
                        // $review_sum = $value['review_sum'];
                        // $count = $value['count'];
                        // $avg_review = $value['avg_review'];
                        
                        // $new_all_review = $value['reviews'];
                        // $new_all_bayes_review = $value['bayes_review'];

                        // Convert serialized string into array
                        // $new_all_review_array = unserialize($value['reviews']);
                        // $new_all_bayes_review_array = unserialize($value['bayes_review']);
                    }
                    
   
                    // echo $img_path;
                    // echo $image_id;
                    // echo $img_name;
                    // echo $is_bayas;
                    


                }
                else{
                    
                    $is_bayas = $_GET["is_bayas"];
                    $img_name = $_GET["new_image_name"];
                    $image_id = $_GET["new_image_id"];
                    // $new_all_review = $_GET["all_review"];
                    // $new_all_bayes_review = $_GET["all_bayes_review"];

                    $src_img_path = 'gray_scale_images/'.$img_name;
                    $gen_img_path = 'generated_images/'.$img_name;
                    $tar_img_path = 'target_images/'.$img_name;

                    // $new_all_review_array = unserialize($new_all_review);
                    // $new_all_bayes_review_array = unserialize($new_all_bayes_review);
                    // echo $img_path;
                    // echo $img_name;
                    // echo $is_bayas;
                    
                }

                if($is_bayas == 1){
                    echo "<p id = 'image_portion'>The original color image is now revealed. How close is the generated image to the original color image? </p>";
                }
                else{
                    echo "<p id = 'image_portion'>You have reviewed ".$_COOKIE['review_count']." images out of 100. A new generated image has appeared. How realistic does it look? </p>";

                }
                ?>
                <!-- <div style="width: 800px;"> -->
                <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 5px;">

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
                    
                    <?php
                    if($is_bayas == 1){

                        $old_image_rating = $_GET['old_image_rating'];
                        echo '<div style = "display: inline-block; text-align: center;">';
                        echo '<figure>';
                        echo '<img src = "'.$tar_img_path.'"style="width: 100%; max-width: 200px; height: 100%; max-height: 200px;" >';
                        echo '<figcaption>Original Color Image</figcaption>';
                        echo '</figure>';
                        echo '</div>';
                    }
                    else{
                        $old_image_rating = 0;
                    }

                    ?>

                </div>


                    <div class="rating-container" style="margin: 0 auto; text-align: center;">
                                <!-- <form action="" enctype="multipart/form-data" method="post"> -->
                                <?php
                                    if($is_bayas == 1){
                                        echo '<p style="padding-top: 10px; font-size: 20px;"> Again Rate It </p>';
                                    }
                                    else{
                                        echo '<p style="padding-top: 10px; font-size: 20px;"> Rate It </p>';
                                    }
                                    ?>
                                        <!-- <p style="padding-top: 10px; font-size: 20px;"> Rate it </p> -->
                                <form action="submit_review.php" method="POST">

                                <div class="col-md-3">
                                <div class="form-group">

                                    <input type="hidden" name="image_id" value=<?php echo $image_id; ?>>
                                    <input type="hidden" name="is_bayas" value=<?php echo $is_bayas; ?>>
                                    <input type="hidden" name="old_image_rating" value=<?php echo $old_image_rating; ?>>
                                    <input type="hidden" name="rating" id="rating" value="0">
                                    <span class="rating-star" data-rating="1">-3</span>
                                    <span class="rating-star" data-rating="2">-2</span>
                                    <span class="rating-star" data-rating="3">-1</span>
                                    <span class="rating-star" data-rating="4">0</span>
                                    <span class="rating-star" data-rating="5">1</span>
                                    <span class="rating-star" data-rating="6">2</span>
                                    <span class="rating-star" data-rating="7">3</span>
                                    <!-- <span class="rating-star" data-rating="99">Skip</span> -->
                                    <!-- <span class="rating-star" data-rating="5">&#9733;</span> -->
                                </div>
                            </div>

                        </div>

                </div>
       
        <section class="our-features">
            <div class="container">
            </div>
        </section>
    </main>

    

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-row">
                <div class="footer_logo-box">
                    <a href="login.php" class="logo">
                        <!-- <img src="images/logo-white.svg" alt="logo"> -->
                    <img src="images/nahin_white.png" alt="logo" height="70" width="130">
                    </a>

                        <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/in/syed-nahin-hossain-658189176/" title="LinkedIn" target="_blank"><i class="fab fa-linkedin"></i><span class="menu-title sr-only">LinkedIn</span></a>
                </li>
                <li class="nav-item"><a class="nav-link" href="https://github.com/NAHIN-JZS" title="Github" target="_blank"><i class="fab fa-github" ></i><span class="menu-title sr-only">Github</span></a>
                </li>
              </ul>
                </div>
                <div class="footer_menu-box">
                    <ul class="footer_menu">
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="index.php">Home</a>
                        </li>
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="https://github.com/NAHIN-JZS/image_colorization" target="_blank">Get GitHub Link</a>
                        </li>
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="https://nahin-jzs.github.io/" target="_blank">About Me</a>
                        </li>
                        
                        <!-- <li class="footer_menu-item">
                            <a class="footer_menu-link" href="pricing.html">Pricing</a>
                        </li> -->
                    </ul>
                </div>
                <!-- <div class="footer_copyright">
                    <a href="convert_an_image.php" class="invite-link invite-link-white">Convert Image</a>
                    <p class="opaque-grey">Copyright 2022. All Rights Reserved</p>
                </div> -->
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>