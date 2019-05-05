<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../../index.php"); 
}else{
	/*************************************** FOR USERS *************************************/
		
	if(isset($_POST['approve'])) {
		include("../connection.php");
		$id=$_POST['hidden'];
		$query="UPDATE signup SET status='approved' WHERE id='". $id ."'";

		$result = mysqli_query($conn, $query);
		if (!$result){
			echo "<script>alert('There is something Wrong.'); location.href='users_mechanics_requests.php'; </script>";

		}else{
			echo "<script>alert ('Account has been approved successfully'); location.href='users_mechanics_requests.php';</script>";
		}
	}
	
	if(isset($_POST['reject'])) {
		include("../connection.php");
		$id=$_POST["hidden"];
		$query="UPDATE signup SET status='rejected' WHERE id='". $id ."'";

		$result = mysqli_query($conn, $query);
		if (!$result){
			echo "<script>alert('There is something Wrong.'); location.href='users_mechanics_requests.php'; </script>";

		}else{
			echo "<script>alert ('Account has been rejected successfully'); location.href='users_mechanics_requests.php';</script>";
		}
	}

	
	/*************************************** FOR MECHANIC *************************************/

	if(isset($_POST['mechanic_approve'])) {
		include("../connection.php");
		$id=$_POST["hidden_2"];
		$query="UPDATE mechanics SET status='approved' WHERE mechanic_id='". $id ."'";

		$result = mysqli_query($conn, $query);
		if (!$result){
			echo "<script>alert('There is something Wrong.'); location.href='users_mechanics_requests.php'; </script>";

		}else{
			echo "<script>alert ('Account has been approved successfully'); location.href='users_mechanics_requests.php';</script>";
		}
	}
	if(isset($_POST['mechanic_reject'])) {
		include("../connection.php");
		$id=$_POST["hidden_2"];
		$query="UPDATE mechanics SET status='rejected' WHERE mechanic_id='". $id ."'";

		$result = mysqli_query($conn, $query);
		if (!$result){
			echo "<script>alert('There is something Wrong.'); location.href='users_mechanics_requests.php'; </script>";

		}else{
			echo "<script>alert ('Account has been rejected successfully'); location.href='users_mechanics_requests.php';</script>";
		}
	}

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
				<section class="user_request col-xs-12">
					<h1>New User's Request</h1>
					<form method="post">
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM signup where status ='pending'");
								while($row = mysqli_fetch_array($result)) {
									echo "<form action='users_mechanics_requests.php' method='post'>";
									echo "<tr>";
									echo "<td><input class='target' type='text' name='hidden' value='". $row['id'] ."' readonly /></td>";
									echo "<td>" . $row[1] . "</td>";
									echo "<td>" . $row[2] . "</td>";
									echo "<td>" . $row[4] . "</td>";
									echo "<td>" . $row[5] . "</td>";
									echo "<td align='center' >
									<input class='acp_rej' type='submit' name='approve' value='Approve' />
									<br />
									<br />
									<input class='acp_rej' type='submit' name='reject' value='Rejected' />
									</td>";
									echo "</tr>";
									echo "</form>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
					</form>
				</section>
			</div>
			<div class="row">
				<section class="mechanic_request col-xs-12">
					<h1>New Mechanics's Request</h1>
					<form method="post">
						<table class="col-xs-12">  
							<thead>  
								<tr>
									<th>ID</th>
									<th>Mechanic Name</th>
									<th>Mechanic Shop Address</th>
									<th>Email</th>
									<th>Password</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include("../connection.php");
								$result = mysqli_query($conn,"SELECT * FROM mechanics where status ='pending'");
								while($row1 = mysqli_fetch_array($result)) {
									echo "<form action='users_mechanics_requests.php' method='post'>";
									echo "<tr>";
									echo "<td><input class='target' type='text' name='hidden_2' value='". $row1[0] ."' readonly /></td>";
									echo "<td>" . $row1[1] . "</td>";
									echo "<td>" . $row1[2] . "</td>";
									echo "<td>" . $row1[3] . "</td>";
									echo "<td>" . $row1[4] . "</td>";
									echo "<td>" . $row1[5] . "</td>";
									echo "<td align='center' >
									<input class='acp_rej' type='submit' name='mechanic_approve' value='Approve' />
									<br><br>
									<input class='acp_rej' type='submit' name='mechanic_reject' value='Reject' />
									</td>";
									echo "</tr>";
									echo "</form>";
								}
								mysqli_close($conn);
								?>

							</tbody>
						</table>
					</form>
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