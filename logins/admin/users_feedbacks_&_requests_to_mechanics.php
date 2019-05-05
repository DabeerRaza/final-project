<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../../index.php"); 
}
else{
	require('../connection.php');
	function fill_requests($conn) {  
		$output = '';  
		$sql = mysqli_query($conn, "SELECT * FROM signup WHERE status = 'approved' ");
		while($row = mysqli_fetch_array($sql)) { 
			if ($row["username"] != 'admin') {
				$output .= '<option value="'.$row["username"].'">'.strtoupper($row["username"]).'</option>'; 
			}

		}  
		return $output;  
	}
	function fill_comments($conn) {  
		$output = '';  
		$sql = mysqli_query($conn, "SELECT * FROM signup WHERE status = 'approved' ");
		while($row = mysqli_fetch_array($sql)) { 
			if ($row["username"] != 'admin') {
				$output .= '<option value="'.$row["username"].'">'.strtoupper($row["username"]).'</option>'; 
			}

		}  
		return $output;  
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
			<?php include('../headers/header_for_admin.php') ?>
		</header>
		<section class="dsgn_title_bar"></section>
		<main class="main_body">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<section class="form-group">
							<h1>Select Any User To Check His Request To Mechanic</h1>
						</section>
						<div class="mechanic-select">
							<select class="select_mechanic" name="user_requests" id="user_requests">  
								<option value="">SELECT THE USER</option>  
								<?php echo fill_requests($conn); ?>  
							</select>
						</div>
						<div id="show_requests"> 
							<h1>See Your Result</h1> 
						</div>
					</div> 
					<div class="col-xs-6">
						<section class="form-group">
							<h1>Select Any User To Check His Request To Mechanic</h1>
						</section>
						<div class="mechanic-select">
							<select class="select_mechanic" name="user_comments" id="user_comments">  
								<option value="">SELECT THE USER</option>  
								<?php echo fill_comments($conn); ?>  
							</select>
						</div>
						<div id="show_comments"> 
							<h1>See Your Result</h1> 
						</div>
					</div> 
				</div> 
			</div>
		</main>
		<section class="dsgn_title_bar"></section>
		<footer>
			<?php include("../footer.php");?>
		</footer>

		<!-- Twitter Bootstrap JS -->
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script>  
			$(document).ready(function(){  
				$('#user_requests').change(function(){  
					var requests = $(this).val();  
					$.ajax({  
						url:"load_data.php",  
						method:"POST",  
						data:{requests:requests},  
						success:function(data){  
							$('#show_requests').html(data);  
						}  
					});  
				});
				$('#user_comments').change(function(){  
					var user_comments = $(this).val();  
					$.ajax({  
						url:"loading_comments.php",  
						method:"POST",  
						data:{user_comments:user_comments},  
						success:function(data){  
							$('#show_comments').html(data);  
						}  
					});  
				});  
			});  
		</script> 
	</body>
	</html>

	<?php 

}

?>