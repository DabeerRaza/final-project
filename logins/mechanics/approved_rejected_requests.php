<?php 

session_start();
if(!isset($_SESSION['mechanic_id'])) {
	header("Location: ../../index.php");  
}else{

	require('../connection.php');

	$mechanic_Id = $_SESSION['mechanic_id'];

	$mchncQuery = "SELECT * FROM mechanics WHERE mechanic_id = $mechanic_Id" ;
	$mchncResult = mysqli_query($conn, $mchncQuery);
	$row = mysqli_fetch_array($mchncResult);
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
		<header>
			<?php include("../headers/header_for_mechanic.php"); ?>
		</header>

		<div class="users_request">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1>APPROVED REQUESTS OF USERS</h1>
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
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE mechanic_name ='".$mechanicName."' AND user_request_status = 'approved' ");
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
						<h1>REJECTED REQUESTS OF USERS</h1>
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
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE mechanic_name ='".$mechanicName."' AND user_request_status = 'rejected' ");
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