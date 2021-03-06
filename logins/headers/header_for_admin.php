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
							<li><a href="../admin/admin.php">HOME</a></li>
							<li><a href="../admin/users_mechanics_requests.php">USERS / MECHANICS REQUESTS</a></li>
							<li><a href="../admin/approved_and_rejected_users_mechanics.php">APPROVED & REJECTED USERS & MECHANICS</a></li>
							<li><a href="../admin/users_feedbacks_&_requests_to_mechanics.php"> MECHANICS</a></li>
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
