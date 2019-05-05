<?php
$conn = mysqli_connect("localhost", "root", "", "registration");  
if(isset($_POST["city_id"])){  
  if($_POST["city_id"] != ''){  
    $sql = "SELECT * FROM mechanics WHERE city_id = '".$_POST["city_id"]."'";  
  }  
  else{  
    $sql = "SELECT * FROM mechanics WHERE status = 'approved'";  
  }  
  $result = mysqli_query($conn, $sql);  
  
  while($row = mysqli_fetch_array($result)) {   
    if ($row['status'] !== 'rejected' && $row['status'] !== 'pending') {?>
       <div class='mechanic_images_main col-xs-6 col-sm-4 col-md-3'>
        <a href='login.php'> 
          <div class="image_detail">
            <img class='img-thumbnail mechanic_image' src="<?php echo "images/mechanic.png"; ?>" alt="mechanic image">
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
}
?>
