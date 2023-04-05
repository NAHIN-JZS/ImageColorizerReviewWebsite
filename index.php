<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photosnap - Home</title>
    <link rel="stylesheet" href="styles/css/main.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
				for (var i = 1; i <= rating; i++) {
					$('.rating-star[data-rating="'+i+'"]').addClass('active');
				}
				$('form').submit();
			});
		});

	</script>
	<style>
		.rating-star {
			display: inline-block;
			font-size: 24px;
			color: #ccc;
			cursor: pointer;
			margin-right: 25px;
		}

		.rating-star:hover,
		.rating-star.active {
			color: #ffbf00;
		}
	</style>
    
</head>


<body>

<?php
require 'con2database.php';

if (!isset($_COOKIE['unique_id5'])) {
  // This is a new user
  header("Location: user_info.php");
//   header('user_info.php');
//   setcookie('unique_ide', uniqid(), time() + 360);
} else {
  // This is a returning user
//   echo "here".$_COOKIE['unique_id5'];
}

?>
    <!-- HEADER -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">
                    <!-- <img src="images/logo.svg" alt="logo"> -->
                    <img src="images/nahin_black.svg" alt="logo" height="150" width="150">
                </a>


                <!-- <a href="add_image.php" class="btn btn-black">Convert an Image</a> -->
                <a href="login.php" class="btn btn-black">Admin</a>

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
            </nav>
        </div>
    </header>


    <!-- MAIN -->
    <main>








        <!-- GALLERY SECTION -->
                <!-- <div class="section_text-box"> -->
                <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 0 55px;">
                                    <h2>Image Colorizer</h2>
                                    <p class="opaque-black">Thank you for taking the time to review the output of my model-generated color photo. The model has attempted to colorize a black and white photo, and I would appreciate your feedback on how realistic it looks. I have included some AI-generated color photos below for reference. Please rate the photo on a scale of 1-5 stars, with 5 stars being the most realistic. Thank you for your help!
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
                    $src_img_path = 'gray_scale_images/'.$img_name;
                    $gen_img_path = 'generated_images/'.$img_name;
                    $tar_img_path = 'target_images/'.$img_name;
                    // echo $img_path;
                    // echo $img_name;
                    // echo $is_bayas;
                    
                }
                echo "How much it looks realistic?";

                ?>
                <!-- <div style="width: 800px;"> -->
                <div style = "width: 100%; max-width: 1000px;  margin: 0 auto; padding: 5px;">

                    <!-- <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" > -->
                    <!-- <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" > -->
                    
                    <div style = "display: inline-block; text-align: center;">
                    <figure>
                    <img src = <?php echo $src_img_path; ?> style="width: 100%; max-width: 200px; height: 100%; max-height: 200px;" >
                    <figcaption>Gray Scale Image</figcaption>
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
                        echo '<figcaption>Target Image</figcaption>';
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
                                
                                <p style="padding-top: 10px; font-size: 20px;"> Rate it </p>
                                <form action="submit_review.php" method="POST">

                                <div class="col-md-3">
                                <div class="form-group">

                                    <input type="hidden" name="image_id" value=<?php echo $image_id; ?>>
                                    <input type="hidden" name="is_bayas" value=<?php echo $is_bayas; ?>>
                                    <input type="hidden" name="old_image_rating" value=<?php echo $old_image_rating; ?>>
                                    <input type="hidden" name="rating" id="rating" value="0">
                                    <span class="rating-star" data-rating="-2">-2</span>
                                    <span class="rating-star" data-rating="-1">-1</span>
                                    <span class="rating-star" data-rating="0">0</span>
                                    <span class="rating-star" data-rating="1">1</span>
                                    <span class="rating-star" data-rating="2">2</span>
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
                    <a href="index.php" class="logo">
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
                <div class="footer_copyright">
                    <a href="convert_an_image.php" class="invite-link invite-link-white">Convert Image</a>
                    <p class="opaque-grey">Copyright 2022. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>