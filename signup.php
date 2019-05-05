 <?php
 session_start();
 if (isset($_SESSION['user'])) {
 	if ($_SESSION['user'] == 'admin') {
 		header("Location: logins/admin/admin.php");  
 	}else{
 		header("Location: logins/users/user.php");  
 	}

 }else if(isset($_SESSION['mechanic_email'])){
 		header("Location: logins/mechanics/mechanic.php");
 }else {
 	include('accounts/server.php');
 	?>
 	<!DOCTYPE html>
 	<html lang="en">
 	<head>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 		<meta charset="UTF-8">
 		<title>Online Auto Mechanic Finder</title>
 		<link rel="stylesheet" href="style/styles.css">

 		<!-- Twitter Bootstrap CSS -->
 		<link rel="stylesheet" href="style/bootstrap.min.css" >
 	</head>
 	<body>
 		<header>
 			<?php include("header.php"); ?>
 		</header>
 		<main class="form_main">
 			<div class="container">
 				<div class="row">
 					<div class="col-lg-12 form_heading">
 						<h1>Sign Up For Users</h1>
 					</div>
 					<section class="col-lg-8 col-md-7 col-sm-5 col-xs-12 form_container_left">
 						<form action="signup.php" class="signup_form" method="post">
 							<div class="col-lg-4 left">
 								<h4>User Name</h4>
 								<input class="form-control" type="text" name="username">

 								<h4>Email</h4>
 								<input class="form-control" type="email" name="email">
 							</div>
 							<div class="col-lg-4 middle">
 								<h4>Password</h4>
 								<input class="form-control" type="password" name="password">
 								<h4>Re-Enter Password</h4>
 								<input class="form-control" type="password" name="re_enter_password">
 							</div>
 							<div class="col-lg-4 right">
 								<button type="submit" name="submit">Sign Up</button>
 							</div>
 						</form>
 						<div class="signup_ask col-xs-12">
 							<span>Don't you have an account?</span>
 							<a href="login.php">Log In</a>
 						</div>
 					</section>
 					<section  class="col-lg-4 col-md-5 col-sm-7 form_container_right">
 						<div class="image_on_right">
 							<img src="images/signup_right_side.png" alt="signup_right_side">
 						</div>
 					</section>
 				</div>
 			</div>
 		</main>
 		<section class="our_services">
 			<div class="container">
 				<div class="row">
 					<div class="blue col-xs-12">
 						<h1>We Service Most Makes and Models</h1>
 					</div>
 				</div>
 				<div class="row mrgb45px">
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/1.png" alt="our_service_logo_1">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/2.png" alt="our_service_logo_2">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/3.png" alt="our_service_logo_3">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/4.png" alt="our_service_logo_4">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/5.png" alt="our_service_logo_5">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/6.png" alt="our_service_logo_6">
 					</div>
 				</div>
 				<div class="row">
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/7.png" alt="our_service_logo_7">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/8.png" alt="our_service_logo_8">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/9.png" alt="our_service_logo_9">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/10.png" alt="our_service_logo_10">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/11.png" alt="our_service_logo_11">
 					</div>
 					<div class="col-md-2 col-xs-4">
 						<img src="images/our_services/12.png" alt="our_service_logo_12">
 					</div>
 				</div>
 			</div>
 		</section>
 		<footer>
 			<?php include("footer.php");?>
 		</footer>
 		
 		<!-- Twitter Bootstrap JS -->
 		<script src="js/bootstrap.min.js"></script>
 		<script src="js/jquery.min.js"></script>
 		<script>
 			$('input[type="submit"]').click(function(event){
 			    return memberValidation(); 
 			});

 			var memberValidation = function () {
 			    //Do validation
 			    if (true)
 			    console.log('true');

 			    if(isValid) {
 			        // Post form via .php   
 			    console.log('false');
 			    }
 			};
 		</script>
 	</body>
 	</html>

 	<?php
 }
 ?>