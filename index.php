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
<!-- <?php
    // $command = escapeshellcmd('python C:\xampp\htdocs\ImageColorization\image_path_generator.py');
    // $returnedValue = shell_exec($command);
    // echo $returnedValue;
    // echo $argv[1];
    // echo $output;
    // $arr = json_decode($returnedValue);
    // var_dump($arr);
    // echo $arr[1];
    // echo $returnedValue;
    ?> -->
    <!-- HEADER -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">
                    <!-- <img src="images/logo.svg" alt="logo"> -->
                    <img src="images/nahin_black.svg" alt="logo" height="150" width="150">
                </a>

                <!-- <ul class="nav_list">
                    <li class="nav_list-item">
                        <a href="stories.html" class="nav_list-link">Stories</a>
                    </li>
                    <li class="nav_list-item">
                        <a href="features.html" class="nav_list-link">Features</a>
                    </li>
                    <li class="nav_list-item">
                        <a href="pricing.html" class="nav_list-link">Pricing</a>
                    </li>
                </ul> -->

                <!-- <a href="add_image.php" class="btn btn-black">Convert an Image</a> -->
                <a href="add_image.php" class="btn btn-black">Admin</a>

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
        <!-- CREATE AND SHARE SECTION -->
        <!-- <section class="create">
            <div class="container-lg">
                <div class="row">
                    <div class="section_text section_text_black">
                        <div class="section_text-box">
                            <h2 class="heading white">Create and share your photo stories.</h2>
                            <p class="opaque-grey">Photosnap is a platform for photographers and visual storytellers. We
                                make it
                                easy to share
                                photos, tell stories and connect with others.</p>
                            <a href="index.html" class="invite-link invite-link-white">Get an invite </a>
                        </div>
                    </div>
                    <div class="section_image section-create-img"></div>
                </div>
            </div>
        </section> -->

        <!-- BEAUTIFUL STORIES SECTION -->
        <!-- <section class="stories">
            <div class="container-lg">
                <div class="row">
                    <div class="section_image section-stories-img"></div>
                    <div class="section_text section_text_white">
                        <div class="section_text-box">
                            <h2 class="heading black">Beautiful stories everytime</h2>
                            <p class="opaque-black">We provide design templates to ensure your stories look terrific.
                                Easily
                                add
                                photos, text, embed
                                maps and media from other networks. Then share your story with everyone.</p>
                            <a href="index.html" class="invite-link invite-link-black">View the stories</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- FOR EVERYONE SECTION -->
        <!-- <section class="everyone">
            <div class="container-lg">
                <div class="row">
                    <div class="section_text section_text_white">
                        <div class="section_text-box">
                            <h2 class="heading black">Designed for everyone</h2>
                            <p class="opaque-black">Photosnap can help you create stories that resonate with your
                                audience.
                                Our
                                tool is designed for photographers of all levels, brands, businesses you name it.</p>
                            <a href="index.html" class="invite-link invite-link-black">View the stories</a>
                        </div>
                    </div>
                    <div class="section_image section-everyone-img"></div>
                </div>
            </div>
        </section> -->

        <!-- GALLERY SECTION -->
                <div class="section_text-box">
                                    <h2 class="heading">Image Colorizer</h2>
                                    <p class="opaque-black">Photosnap can help you create stories that resonate with your
                                        audience.
                                        Our
                                        tool is designed for photographers of all levels, brands, businesses you name it.</p>
                </div>

                <div style = "width: 400px; margin: 0 auto;">
                <?php
                if(!isset($_GET["image_path"])){
                    $img_path = "images/18-days-voyage-m.jpg";
                    $image_id = 40;
                    echo $img_path;
                    echo $image_id;
                }
                else{
                    $img_path = $_GET["image_path"];
                    $image_id = $_GET["new_image_id"];
                    echo $img_path;
                    echo $image_id;
                }
                
                ?>
                    <img src = <?php echo $img_path; ?> style="width:256px;height:256px;" >

                    <div class="rating-container">
                                <!-- <form action="" enctype="multipart/form-data" method="post"> -->
                                <form action="submit_review.php" method="POST">

                                <div class="col-md-3">
                                <div class="form-group">

                                    <!-- <label for="h_type">Give a Number</label><br>
                                    <select class="select_box form-control form-control-sm" id="h_type" name="h_type" size="1">
                                        <option value="---">10 </option>
                                        <option value="9">9</option>
                                        <option value="8">8</option>
                                        <option value="7">7</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select> -->

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

        <!-- FEATURES GRID -->
        <!-- <section class="our-features">
            <div class="container">
                <div class="row">
                    <div class="feature">
                        <div class="feature-image"><img src="images/responsive.svg" alt="responsive"></div>
                        <h3 class="feature-heading">100% Responsive</h3>
                        <p class="feature-text">No matter which the device you’re on, our site is fully responsive and
                            stories look beautiful on
                            any screen.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-image"><img src="images/no-limit.svg" alt="no limit"></div>
                        <h3 class="feature-heading">No Photo Upload Limit</h3>
                        <p class="feature-text">Our tool has no limits on uploads or bandwidth. Freely upload in bulk
                            and
                            share all of your stories in one go.</p>
                    </div>
                    <div class="feature">
                        <div class="feature-image"><img src="images/embed.svg" alt="embed"></div>
                        <h3 class="feature-heading">Available to Embed</h3>
                        <p class="feature-text">Embed Tweets, Facebook posts, Instagram media, Vimeo or YouTube videos,
                            Google Maps, and more.
                        </p>
                    </div>
                </div>
            </div>
        </section> -->
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
                    <!-- <ul class="social">
                        <li>
                            <a class="email" href="index.html"></a>
                        </li> -->

                       <!-- <li>
                            <a class="facebook" href="index.html"></a>
                        </li>
                        <li>
                            <a class="linkedin" href="https://www.linkedin.com/in/syed-nahin-hossain-658189176/"></a>
                        </li> -->
                        <!-- <li>
                            <a class="youtube" href="index.html"></a>
                        </li>
                        <li>
                            <a class="twitter" href="index.html"></a>
                        </li> -->
                        <!-- <li>
                            <a class="pinterest" href="index.html"></a>
                        </li> 
                        <li>
                            <a class="instagram" href="index.html"></a>
                        </li> -->


                        <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/in/syed-nahin-hossain-658189176/" title="LinkedIn"><i class="fab fa-linkedin"></i><span class="menu-title sr-only">LinkedIn</span></a>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="https://orcid.org/0000-0003-2528-7573" title="Orcid"><i class="fab fa-orcid"></i><span class="menu-title sr-only">Orcid</span></a> --> -->
                <!-- </li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/templateflip" title="Instagram"><i class="fab fa-instagram"></i><span class="menu-title sr-only">Instagram</span></a>
                </li> -->
                <li class="nav-item"><a class="nav-link" href="https://github.com/NAHIN-JZS" title="Github"><i class="fab fa-github"></i><span class="menu-title sr-only">Github</span></a>
                </li>
              </ul>
                </div>
                <div class="footer_menu-box">
                    <ul class="footer_menu">
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="index.html">Home</a>
                        </li>
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="stories.html">Get GitHub Link</a>
                        </li>
                        <li class="footer_menu-item">
                            <a class="footer_menu-link" href="features.html">About</a>
                        </li>
                        
                        <!-- <li class="footer_menu-item">
                            <a class="footer_menu-link" href="pricing.html">Pricing</a>
                        </li> -->
                    </ul>
                </div>
                <div class="footer_copyright">
                    <a href="convert.php" class="invite-link invite-link-white">Convert Image</a>
                    <p class="opaque-grey">Copyright 2022. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>