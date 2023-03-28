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
				for (var i = 1; i <= rating; i++) {
					$('.rating-star[data-rating="'+i+'"]').addClass('active');
				}
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
			margin-right: 5px;
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
                <div class="section_text-box">
                                    <h2>Image Colorizer</h2>
                                    <p class="opaque-black">Thank you for taking the time to review the output of my model-generated color photo. The model has attempted to colorize a black and white photo, and I would appreciate your feedback on how realistic it looks. I have included some AI-generated color photos below for reference. Please rate the photo on a scale of 1-5 stars, with 5 stars being the most realistic. Thank you for your help!
                                    </p>
                </div>

                <div style = "width: 400px; margin: 0 auto;">
                <?php
                if(!isset($_GET["image_path"])){
                    // $img_path = "images/18-days-voyage-m.jpg";
                    // $image_id = 40;

                    $get_one_image_with_lowest_count = 'SELECT * FROM `image_info` WHERE `image_info`. `count` = (SELECT MIN(`image_info`. `count`) FROM `image_info`) LIMIT 1;';
    
                    $new_data = mysqli_query($connect, $get_one_image_with_lowest_count);

                    foreach ($new_data as $key => $value) {
                        $image_id = $value['id'];
                        $img_path = $value['path'];
                        // $review_sum = $value['review_sum'];
                        // $count = $value['count'];
                        // $avg_review = $value['avg_review'];
                    }
                    
   
                    // echo $img_path;
                    // echo $image_id;


                }
                else{
                    $img_path = $_GET["image_path"];
                    $image_id = $_GET["new_image_id"];
                    // echo $img_path;
                    // echo $image_id;
                    echo "How much it looks realistic?";
                }
                
                ?>
                    <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" >

                    <div class="rating-container">
                                <!-- <form action="" enctype="multipart/form-data" method="post"> -->
                                <form action="submit_review.php" method="POST">

                                <div class="col-md-3">
                                <div class="form-group">

                                    <input type="hidden" name="image_id" value=<?php echo $image_id; ?>>
                                    <input type="hidden" name="rating" id="rating" value="0">
                                    <span class="rating-star" data-rating="1">&#9733;</span>
                                    <span class="rating-star" data-rating="2">&#9733;</span>
                                    <span class="rating-star" data-rating="3">&#9733;</span>
                                    <span class="rating-star" data-rating="4">&#9733;</span>
                                    <span class="rating-star" data-rating="5">&#9733;</span>
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