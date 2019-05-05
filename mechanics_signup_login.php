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

	$conn = mysqli_connect('localhost', 'root', '', 'registration');
	function fill_city($conn) {  
		$output = '';  
		$sql = "SELECT * FROM city";  
		$result = mysqli_query($conn, $sql);  
		while($row = mysqli_fetch_array($result)) {  
			$output .= '<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';  
		}  
		return $output;  
	} 

	?>

	<?php include('accounts/server.php'); ?>
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
		<section class="mechanic_account_title">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h4>Are you a mechanic and interested to be approached? Then make an Free account. </h4>
					</div>
				</div>
			</div>
		</section>
		<main class="mechanic_signup_login">
			<div class="container">
				<div class="row">
					<div class="col-xs-8 right-border">
						<div class="col-lg-12 form_heading">
							<h1>Don't you have an account ?</h1>
							<h1> Sign Up</h1>
						</div>
						<div class="signUp">
							<form action="mechanics_signup_login.php" class="mechanics_signup_login" method="post">
								<div class="col-md-6">
									<input class="form-control" type="text" name="mechanic_name" placeholder="Full Name">
									<select name="city_name" class="select_city">
										<option value="">Select a city</option>
										<?php echo fill_city($conn); ?>
									</select>
									<textarea name="mechanic_shop_address" class="textarea" placeholder="Shop Address"></textarea>
								</div>
								<div class="col-md-6">
									<input class="form-control" type="email" name="email" placeholder="Email">
									<input class="form-control" type="password" name="password" placeholder="Password">
									<input class="form-control" type="password" name="re-password" placeholder="Re-Password">
									<button type="submit" name="mechanic_signup">Request to Sign up</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form_heading col-xs-12">
							<h1>Have an account ?</h1>
							<h1>Log In</h1>
						</div>
						<div class="login">
							<form  method="post" action="mechanics_signup_login.php">
								<div class="col-md-12">
									<input class="form-control" type="email" name="mechanic_email" placeholder="Email">
								</div>
								<div class="col-md-12">
									<input class="form-control" type="password" name="mechanic_password" placeholder="Password">
								</div>
								<div class="col-md-12">
									<button type="submit" name="mechanic_login">Log In</button>
								</div>
							</form>
						</div>
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
			<!-- <script>
				
				document.querySelector('#citiID').onchange = function(){   
					const cityID = this.selectedOptions[0].getAttribute('data-cityID'); 
					document.querySelector("#citiIDSelected").value = cityID;
				};	
			</script> -->
		</body>
		</html>

		<?php
	}
	?>