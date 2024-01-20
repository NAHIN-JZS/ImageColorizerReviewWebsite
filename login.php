<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!-- <link rel="stylesheet" type="text/css" href="style\logIn\login.css"> -->
</head>


<?php

// start the session
session_start();
	require 'con2database.php';
	$login_error = 0;
	if(isset($_POST['login'])) {

		// Get data from FORM
		$u_name = $_POST['u_name'];
		$password = $_POST['password'];

		if ($u_name =="admin"){

			if ($password == "1234") {

				
				$_SESSION['login'] = 1;

				header('location:admin_page.php');
        	}
				else{
					//echo "Incorrect Password";
					$login_error = 1; 
				}

		}

		else{

			$login_error = 2;
		}

		
	}
        
		// $sql_login_find = "SELECT * from `user` WHERE `email` = '$email';";
		// $result = mysqli_query($connect, $sql_login_find);
		

	// 	if (mysqli_num_rows($result) > 0) {
	// 		// while($row = mysqli_fetch_assoc($result)) {
	// 			foreach ($result as $key => $row) {
	// 			if($row['password'] == $password){
	// 				$_SESSION['u_id'] = $row['id'];
	// 				$_SESSION['u_name'] = $row['name'];
	// 				$_SESSION['u_phone'] = $row['phone'];
	// 				$_SESSION['u_email'] = $row['email'];
	// 				$_SESSION['u_password'] = $row['password'];
	// 				$_SESSION['u_address'] = $row['permanent_address'];

	// 				//echo $_SESSION['u_name'];

	// 				header('location:index.php');
					
	// 			}
	// 			else{
	// 				//echo "Incorrect Password";
	// 				$login_error = 1; 
	// 			}
	// 		}
	// 	} 
	// 	else {
	// 		//echo "Don't have account? Please Sign up";
	// 		$login_error = 2;
	// 	}

	// 	mysqli_close($connect);
		
		
	// }
?>



<body>

<div class="container">

	<div class="d-flex justify-content-center h-100">
    
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
			</div>
			<div class="card-body">
				<form action="" method ="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="User Name" name='u_name'>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name='password'>
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
					<p style="color:red; text-align:center;">
						<?php
							if($login_error == 1){
								echo "Incorrect Password";
							}
							elseif($login_error ==2) {
								echo "Incorrect User Name";
							}
						?>
					</p>
				<div class="d-flex justify-content-center links">
				
					Don't know password? <a href="index.php"> Go and Review</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>