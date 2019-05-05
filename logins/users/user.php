<?php 
session_start();
if(!isset($_SESSION['user'])){
	header("Location: ../../index.php"); 
}else{
	   //load_data_select.php  
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
	function fill_mechanics($conn) {  

		$sql = "SELECT * FROM mechanics WHERE status = 'approved' ";  
		$result = mysqli_query($conn, $sql); 

		while($row = mysqli_fetch_array($result)) {
			// ************************** MECHANIC_NAME "VARIABLE" ************************** //
			$mechanic_id = $row['mechanic_id'];
			$_SESSION['mechanic_id'] = $mechanic_id;
			$mechanicId = $_SESSION['mechanic_id'];?>

 			<div class='mechanic_images_main col-xs-6 col-sm-4 col-md-3'>
				<a href="<?php echo "mechanics_details_for_users.php?mechanic_Id=$mechanicId" ?>" target="_blank" >
					<div class="image_detail">
						<?php 
							if ($row['mechanic_image'] == '') { ?>
								<img class="img-thumbnail mechanic_image" src="../../images/mechanic.png" alt="mechanic profile picture">
						<?php }else{ ?>
								<img class="img-thumbnail mechanic_image" src="../mechanics/upload/<?php echo $row['mechanic_image']; ?>" alt="mechanic profile picture">
						<?php } ?>
						<h1> <?php echo $row["mechanic_name"]; ?> </h1>
					</div>
					<div class='shop_address_detail'>
						<h5>Shop Address</h5>
						<h4><?php echo $row["mechanic_shop_address"]; ?></h4>
					</div>
				</a>
			</div>

		<?php } 

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
		<div>
			<?php include("../headers/header_for_user.php") ?>
		</div>
		<main class="main_body">
			<div class="container">
				<div class="row">
					<section class="col-xs-12 form-group">
						<h1>Do you need a Mechanic ?</h1>
					</section>
				</div>
				<div class="row">
					<div class="col-xs-12 mechanic-select">
						<select class="select_mechanic" name="city" id="city">  
							<option value="">Show All mechanics</option>  
							<?php echo fill_city($conn); ?>  
						</select>
					</div>
					<div class="col-md-12" id="show_mechanics">  
						<?php echo fill_mechanics($conn);?>  
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script>  
			$(document).ready(function(){  
				$('#city').change(function(){  
					var city_id = $(this).val();  
					$.ajax({  
						url:"load_data.php",  
						method:"POST",  
						data:{city_id:city_id},  
						success:function(data){  
							$('#show_mechanics').html(data);  
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