<?php 

session_start();
if(!isset($_SESSION['user'])){
	header("Location: user.php"); 
}else{

	require('../connection.php');

	$username = $_SESSION['user'];

	$request_check = mysqli_query($conn, "SELECT * FROM user_request_to_mechanic WHERE username = '".$username."' ");
	$request_result = mysqli_fetch_array($request_check);
	$userName = $request_result['username'];


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
		<header>
			<?php include("../headers/header_for_user.php"); ?>
		</header>

		<div class="users_request">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1>APPROVED REQUESTS</h1>
						<form method="POST">
							<table class="col-xs-12">  
								<thead>  
									<tr>
										<th>ID</th>
										<th>Username</th>
										<th>Mechanic Name</th>
										<th>User Request Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE username ='".$userName."' AND user_request_status = 'approved' ");
									while($RqstRow = mysqli_fetch_array($usrRqstQry)) {
										echo "<tr>";
										echo "<td>" . $RqstRow[0] . "</td>";
										echo "<td>" . $RqstRow[1] . "</td>";
										echo "<td>" . $RqstRow[2] . "</td>";
										echo "<td>" . $RqstRow[3] . "</td>";
										echo "</tr>";
									}
									?>

								</tbody>
							</table>
						</form>		
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h1>REJECTED REQUESTS</h1>
						<form method="POST">
							<table class="col-xs-12">  
								<thead>  
									<tr>
										<th>ID</th>
										<th>Username</th>
										<th>Mechanic Name</th>
										<th>User Request Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE username ='".$userName."' AND user_request_status = 'rejected' ");
									while($RqstRow = mysqli_fetch_array($usrRqstQry)) {
										echo "<tr>";
										echo "<td>" . $RqstRow[0] . "</td>";
										echo "<td>" . $RqstRow[1] . "</td>";
										echo "<td>" . $RqstRow[2] . "</td>";
										echo "<td>" . $RqstRow[3] . "</td>";
										echo "</tr>";
									}
									?>

								</tbody>
							</table>
						</form>		
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h1>PENDING REQUESTS</h1>
						<form method="POST">
							<table class="col-xs-12">  
								<thead>  
									<tr>
										<th>ID</th>
										<th>Username</th>
										<th>Mechanic Name</th>
										<th>User Request Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE username ='".$userName."' AND user_request_status = 'pending' ");
									while($RqstRow = mysqli_fetch_array($usrRqstQry)) {
										echo "<tr>";
										echo "<td>" . $RqstRow[0] . "</td>";
										echo "<td>" . $RqstRow[1] . "</td>";
										echo "<td>" . $RqstRow[2] . "</td>";
										echo "<td>" . $RqstRow[3] . "</td>";
										echo "</tr>";
									}
									?>

								</tbody>
							</table>
						</form>		
					</div>
				</div>
			</div>
		</div>

		<footer>
			<?php include("../footer.php");?>
		</footer>


		<!-- Twitter Bootstrap JS -->
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/jquery.min.js"></script>

	</body>
	</html>

	<?php 
}
?>