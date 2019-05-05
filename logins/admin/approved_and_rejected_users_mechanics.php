<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../../index.php"); 
}
else{

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
		<?php include("../headers/header_for_admin.php"); ?>
	</header>
	<main class="main_body">
		<div class="container">
			<div class="row">
				<section class="users_main col-xs-12">
					<div class="approved_users">
						<h1>APPROVED USERS</h1>
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM signup where status ='Approved'");
								while($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row[0] . "</td>";
									echo "<td>" . $row[1] . "</td>";
									echo "<td>" . $row[2] . "</td>";
									echo "<td>" . $row[4] . "</td>";
									echo "<td>" . $row[5] . "</td>";
									echo "</tr>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
					</div>
					<div class="rejected_users">
						<h1>REJECTED USERS</h1>
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM signup where status ='rejected'");
								while($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row[0] . "</td>";
									echo "<td>" . $row[1] . "</td>";
									echo "<td>" . $row[2] . "</td>";
									echo "<td>" . $row[4] . "</td>";
									echo "<td>" . $row[5] . "</td>";
									echo "</tr>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
					</div>
				</section>
			</div>
			<div class="row">
				<section class="users_main col-xs-12">
					<div class="approved_users">
						<h1>APPROVED MECHANICS</h1>
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>Mechanics Name</th>
									<th>Mechanics Shop Address</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM mechanics where status ='Approved'");
								while($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row[0] . "</td>";
									echo "<td>" . $row[1] . "</td>";
									echo "<td>" . $row[2] . "</td>";
									echo "<td>" . $row[4] . "</td>";
									echo "<td>" . $row[5] . "</td>";
									echo "<td>" . $row[7] . "</td>";
									echo "</tr>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
					</div>
					<div class="rejected_users">
						<h1>REJECTED MECHANICS</h1>
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>Mechanics Name</th>
									<th>Mechanics Shop Address</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM mechanics where status ='rejected'");
								while($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row[0] . "</td>";
									echo "<td>" . $row[1] . "</td>";
									echo "<td>" . $row[2] . "</td>";
									echo "<td>" . $row[4] . "</td>";
									echo "<td>" . $row[5] . "</td>";
									echo "<td>" . $row[7] . "</td>";
									echo "</tr>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
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
					<img src="../../images/our_services/1.png" alt="our_service_logo_1">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/2.png" alt="our_service_logo_2">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/3.png" alt="our_service_logo_3">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/4.png" alt="our_service_logo_4">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/5.png" alt="our_service_logo_5">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/6.png" alt="our_service_logo_6">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/7.png" alt="our_service_logo_7">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/8.png" alt="our_service_logo_8">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/9.png" alt="our_service_logo_9">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/10.png" alt="our_service_logo_10">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/11.png" alt="our_service_logo_11">
				</div>
				<div class="col-md-2 col-xs-4">
					<img src="../../images/our_services/12.png" alt="our_service_logo_12">
				</div>
			</div>
		</div>
	</section>
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