<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- <link rel="stylesheet" type="text/css" href="style\logIn\login.css"> -->
</head>


<?php

	require 'con2database.php';
	$first_time = 1;
	if(isset($_POST['login'])) {

		// Get data from FORM
		// $email = $_POST['email'];
		

		if (isset($_POST['age'])) {
            

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "image_colorizer";
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			setcookie('unique_id5', uniqid(), time() + 36);
				$uAge = $_POST['age'];
				$comPro = $_POST['cp'];
				$c_id = $_COOKIE['unique_id5'];
				$sql_enter_new_user_info = "INSERT INTO `user_info` (`cookie_id`,`age`,`cp`) VALUES ('$c_id', '$uAge', '$comPro');";

				mysqli_query($conn, $sql_enter_new_user_info);

                // setcookie('unique_idee3', uniqid(), time() + 36);
				header('location:index.php');
				// echo "1";
        }
				else{
					//echo "Incorrect Password";
					$login_error = 1; 
					setcookie('unique_id5', uniqid(), time() + 36);
					header('location:index.php');
					// echo "2";
				}
	}
	else if ($first_time != 1){
		//echo "Incorrect Password";
		$first_time = 0; 
		setcookie('unique_id5', uniqid(), time() + 36);
		// echo "3";
		header('location:index.php');
	}
        
?>



<body>

<div class="container">

	<div class="d-flex justify-content-center h-100">
    
		<div class="card">
			<div class="card-header">
				<h3>Reviewer Survey</h3>
				
			</div>
			<div class="card-body">
				<form action="" method ="post">
					<!-- <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="email" name='email'>
						
					</div> -->
					<!-- <div class="input-group form-group"> -->
						<!-- <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div> -->
                        <p>Your Age Range?<br></p>
						<input type="radio" name="age" value="Below_20"> Below 20<br>
                        <input type="radio" name="age" value="20_30"> 20 to 30<br>
                        <input type="radio" name="age" value="Above_30"> Above 30<br> <br>

						<p>Your Computer Proficiency?<br></p>
						<input type="radio" name="cp" value="low"> Low<br>
                        <input type="radio" name="cp" value="medium"> Medium<br>
                        <input type="radio" name="cp" value="high"> High<br>

					<!-- </div> -->
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
					<!-- <p style="color:red; text-align:center;">
						<?php
							// if($login_error == 1){
							// 	echo "Incorrect Password";
							// }
							// elseif($login_error ==2) {
							// 	echo "Not Registered Email";
							// }

							$first_time = 0;
						?>
					</p> -->

				<div class="d-flex justify-content-center links">
				
					Skip for Now? <a href="user_info.php"> Start Review</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>