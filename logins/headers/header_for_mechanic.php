<?php 

	require('../connection.php');

	$mechanic_Id = $_SESSION['mechanic_id'];

	$query = "SELECT * FROM mechanics WHERE mechanic_id = $mechanic_Id" ;
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$mechanicName = $row['mechanic_name'];
	$mechanicCity = $row['city_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Auto Mechanic Finder</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="../../style/styles.css">

	<!-- Twitter Bootstrap CSS -->
	<link rel="stylesheet" href="../../style/bootstrap.min.css" >
</head>
<body>
	
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="float-left col-sm-6">
					<span>Got a Problem?</span>
					<span class="col-sm-offset-1">
						<abbr title="Phone">
							<i class="fas fa-phone-volume"></i>
						</abbr>
						+92300 1234567 
					</span>
				</div>
				<div class="col-sm-6">
					<ul class="pull-right list-inline" >
						<li><a class="icon" href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a class="icon" href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a class="icon" href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a class="icon" href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a class="icon" href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<nav class="navigation">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">
							<img src="../../images/logo.png" alt="logo">
						</a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li><a href="../mechanics/mechanic.php"><?php echo strtoupper("$mechanicName"); ?></a></li>
							<li><a href="../mechanics/users_reuests_to_mechanic.php">USERS REQUESTS</a></li>
							<li><a href="../mechanics/approved_rejected_requests.php">APPROVED / REJECTED REQUESTS</a></li>
							<li><a href="../logOut.php">LOG OUT</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</nav>
	
	<!-- Twitter Bootstrap JS -->
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</body>
</html>

