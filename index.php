 <?php

session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user'] == 'admin') {
        header("Location: logins/admin/admin.php");
    } else {
        header("Location: logins/users/user.php");
    }

} else if (isset($_SESSION['mechanic_name'])) {
    header("Location: logins/mechanics/mechanic.php");
} else {
    //load_data_select.php
    $conn = mysqli_connect('localhost', 'root', '', 'registration');
    function fillCity($conn)
    {
        $output = '';
        $sql = "SELECT * FROM city";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option value="' . $row["city_id"] . '">' . $row["city_name"] . '</option>';
        }
        return $output;
    }
    function fillMechanics($conn)
    {
        $sql = "SELECT * FROM mechanics WHERE status = 'approved' ";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {?>
     <div class='mechanic_images_main col-xs-6 col-sm-4 col-md-3'>
      <a href='login.php'>
        <div class="image_detail">
          <?php
if ($row['mechanic_image'] == '') {?>
            <img class="img-thumbnail mechanic_image" src="images/mechanic.png" alt="mechanic profile picture">
          <?php } else {?>
            <img class="img-thumbnail mechanic_image" src="logins/mechanics/upload/<?php echo $row['mechanic_image']; ?>" alt="mechanic profile picture">
          <?php }?>
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Online Auto Mechanic Finder</title>
  <link rel="stylesheet" href="style/styles.css">

  <!-- Twitter Bootstrap CSS -->
  <link rel="stylesheet" href="style/bootstrap.min.css" >
</head>
<body>
  <header>
   <?php include "header.php";?>
 </header>
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
          <?php echo fillCity($conn); ?>
        </select>
      </div>
    </div>
    <div class="row">
     <div class="" id="show_mechanics">
      <?php echo fillMechanics($conn); ?>
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
        <img src="images/our_services/1.png" alt="our_service_logo_1">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/2.png" alt="our_service_logo_2">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/3.png" alt="our_service_logo_3">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/4.png" alt="our_service_logo_4">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/5.png" alt="our_service_logo_5">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/6.png" alt="our_service_logo_6">
      </div>
    </div>
    <div class="row">
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/7.png" alt="our_service_logo_7">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/8.png" alt="our_service_logo_8">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/9.png" alt="our_service_logo_9">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/10.png" alt="our_service_logo_10">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/11.png" alt="our_service_logo_11">
      </div>
      <div class="col-md-2 col-xs-4">
        <img src="images/our_services/12.png" alt="our_service_logo_12">
      </div>
    </div>
  </div>
</section>
<footer>
 <?php include "footer.php";?>
</footer>

<!-- Twitter Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
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
