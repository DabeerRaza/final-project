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


	/*************************************** FOR USERS *************************************/
	if(isset($_POST['approve'])) {
		include("../connection.php");
		$id=$_POST['hidden'];
		$query= mysqli_query($conn, "UPDATE user_request_to_mechanic SET user_request_status='approved' WHERE id='". $id ."'");
		if (!$query){
			echo "<script>alert('There is something Wrong.'); location.href='users_reuests_to_mechanic.php'; </script>";

		}else{
			echo "<script>alert ('Account has been approved successfully'); location.href='users_reuests_to_mechanic.php';</script>";
		}
	}
	if(isset($_POST['reject'])) {
		include("../connection.php");
		$id=$_POST['hidden'];
		$query="UPDATE user_request_to_mechanic SET user_request_status='rejected' WHERE id='". $id ."'";

		$result = mysqli_query($conn, $query);
		if (!$result){
			echo "<script>alert('There is something Wrong.'); location.href='users_reuests_to_mechanic.php'; </script>";

		}else{
			echo "<script>alert ('Account has been rejected successfully'); location.href='users_reuests_to_mechanic.php';</script>";
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
			<?php include("../headers/header_for_mechanic.php"); ?>
		</header>

		<div class="users_request">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1>USERS' REQUETS</h1>
						<form method="POST">
							<table class="col-xs-12  status_table">  
								<thead>  
									<tr>
										<th>ID</th>
										<th>Username</th>
										<th>Mechanic Name</th>
										<th>User Request Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$usrRqstQry = mysqli_query($conn,"SELECT * FROM user_request_to_mechanic WHERE mechanic_name ='".$mechanicName."' AND user_request_status = 'pending' ");
									while($RqstRow = mysqli_fetch_array($usrRqstQry)) {
										echo "<form action='users_reuests_to_mechanic.php method='post' >";
										echo "<tr>";
										echo "<td><input class='target' type='text' name='hidden' value='". $RqstRow['id'] ."' readonly /></td>";
										echo "<td>" . $RqstRow[1] . "</td>";
										echo "<td>" . $RqstRow[2] . "</td>";
										echo "<td>" . $RqstRow[3] . "</td>";
										echo "<td align='center' >
										<input class='acp_rej' type='submit' name='approve' value='Approve' />
										<br><br>
										<input class='acp_rej' type='submit' name='reject' value='Reject' />
										</td>";
										echo "</tr>";
										echo "</form>";
									}
									mysqli_close($conn);
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