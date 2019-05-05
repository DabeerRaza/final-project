<?php 
/**************************************** CONNECTION ****************************************/
$server_name="localhost";
$username="root";
$password="";
$DataBase="registration";
$conn = mysqli_connect($server_name, $username, $password, $DataBase);

/********************************** USER AND ADMIN SIGNUP *********************************/

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_enter_password'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_enter_password = $_POST['re_enter_password'];

  if(!empty($username) && !empty($email) && !empty($password) && !empty($re_enter_password)){

    $query_username = mysqli_query($conn, "SELECT * FROM signup WHERE username = '$username'");
    $query_email = mysqli_query($conn, "SELECT * FROM signup WHERE email = '$email'");
    if(mysqli_num_rows($query_username) > 0){
      echo "<script>alert('This Username already exists.');</script>";
    }elseif(mysqli_num_rows($query_email) > 0){
      echo "<script>alert('This email already exists.');</script>";
    }
    else{
      if($password !== $re_enter_password){
        echo "<script>alert('Two passwords do not match.');</script>";
      }
      else{
        mysqli_query($conn, "INSERT INTO signup (username, email, password, re_enter_password, status) 
          VALUES('$username', '$email', '$password', '$re_enter_password', 'pending')");
        echo "<script>alert('Your request has been saved successfully and you will be able to login after admin approval.');</script>";
      }
    }
    
  } 
  else {
    if($_POST['username'] == ''){
      echo "<script>alert('username is missing')</script>";
    }else if($_POST['email'] == ''){
      echo "<script>alert('email is missing')</script>";
    }else if($_POST['password'] == ''){
      echo "<script>alert('password is missing')</script>";
    }else if($_POST['re_enter_password'] == ''){
      echo "<script>alert('re_enter_password is missing')</script>";
    }
    else if($_POST['password'] !== $_POST['re_enter_password'] ){
      echo "<script>alert('Two Passwords do not match.')</script>";
    }
  }
}
/********************************** USER AND ADMIN LOGIN ***********************************/

if(isset($_POST['login'])){
  if(!empty($_POST['username']) AND !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query="SELECT * FROM signup WHERE username='". $username ."' AND password='". $password ."'";
    $result = mysqli_query($conn, $query);
    $datas = array();
    $row = mysqli_num_rows($result);
    if ($row == 1) {
      while($fetch_array = mysqli_fetch_array($result)){
        $datas[] = $fetch_array;
      }
      foreach ($datas as $data) {
        if (($data['username'] == 'admin') && ($data['password'] == '12345')) {
          $_SESSION['user'] = $username;
          header('location: logins/admin/admin.php');
        } else {
          if($data['status'] == 'pending'){
            echo "<script>alert('Your request is pending.');</script>";
          }elseif($data['status'] == 'rejected'){
            echo "<script>alert('your request is rejected by admin.');</script>";
          }else{
            $_SESSION['user'] = $username;
            header('location: logins/users/user.php');
          }
        } 
      }
    } else {
      echo "<script>alert ('Username does not match with the records in database.');</script>";
    }
  }else{
    if($_POST['username'] == ''){
      echo "<script>alert('username is missing')</script>";
    }else if($_POST['password'] == ''){
      echo "<script>alert('password is missing')</script>";
    }
  }
}



/************************************************** MECHANIC SIGNUP ****************************************************/


if(isset($_POST['mechanic_name']) && isset($_POST['city_name']) && isset($_POST['mechanic_shop_address']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])){
  $mechanic_name = $_POST['mechanic_name'];
  $city_name = $_POST['city_name']; // this is City ID from database
  $mechanic_shop_address = $_POST['mechanic_shop_address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $re_password = ($_POST['re-password']);

  if(!empty($mechanic_name) && !empty($city_name) && !empty($mechanic_shop_address) && !empty($email) && !empty($password)&& !empty($re_password)){

    $query_mechanic_name = mysqli_query($conn, "SELECT * FROM mechanics WHERE mechanic_name = '$mechanic_name'");
    $query_email = mysqli_query($conn, "SELECT * FROM mechanics WHERE email = '$email'");

    if(mysqli_num_rows($query_mechanic_name) > 0){
      echo "<script>alert('This Username already exists.');</script>";
    }elseif(mysqli_num_rows($query_email) > 0){
      echo "<script>alert('This email already exists.');</script>";
    }
    else{
      if($password !== $re_password ){
        echo "<script>alert('Password does not match.')</script>";
      }else{

        mysqli_query($conn, "INSERT INTO mechanics (mechanic_name, mechanic_shop_address, email, password, city_id, status)VALUES('$mechanic_name', '$mechanic_shop_address', '$email', '$password', '$city_name' , 'pending')");

        echo "<script>alert('Your request has been saved successfully and you will be able to login after admin approval.');</script>";

      }
    }
  } 
  else {
    if($_POST['mechanic_name'] == ''){
      echo "<script>alert('Mechanic name is missing')</script>";
    }else if($_POST['city_name'] == ''){
      echo "<script>alert('Mechanic city is missing')</script>";
    }else if($_POST['mechanic_shop_address'] == ''){
      echo "<script>alert('mechanic Shop Address is missing')</script>";
    }else if($_POST['email'] == ''){
      echo "<script>alert('mechanic email is missing')</script>";
    }
    else if($_POST['password'] == ''){
      echo "<script>alert('Password is missing.')</script>";
    }
    else if($_POST['re-password'] == ''){
      echo "<script>alert('Re-Password is missing.')</script>";
    }
  }
}

/*********************************************** MECHANIC LOGIN **************************************************/

if(isset($_POST['mechanic_login'])){
  if(!empty($_POST['mechanic_email']) AND !empty($_POST['mechanic_password'])) {
    $mechanic_email = $_POST['mechanic_email'];
    $mechanic_password = $_POST['mechanic_password'];

    $query="SELECT * FROM mechanics WHERE email='". $mechanic_email ."' AND password='". $mechanic_password ."'";
    $result = mysqli_query($conn, $query);
    $datas = array();
    $row = mysqli_num_rows($result);
    if ($row == 1) {
      while($fetch_array = mysqli_fetch_array($result)){
        $datas[] = $fetch_array;
      }
      foreach ($datas as $data) {
        if(($data['email'] != $mechanic_email) && ($data['password'] != $mechanic_password)) {
          echo "<script>alert('Wrong Email and pasword. Please check your entered data.');</script>";
        }else{
          if($data['status'] == 'pending'){
            echo "<script>alert('Your request is pending.');</script>";
          }elseif($data['status'] == 'rejected'){
            echo "<script>alert('your request is rejected by admin.');</script>";
          }else{
            $_SESSION['mechanic_id'] = $data['mechanic_id'];
            $mechanic_Id = $_SESSION['mechanic_id'];
            header('location: logins/mechanics/mechanic.php');
          }
        }
      }
    } else {
      echo "<script>alert ('user name or password do not match with the records in database.');</script>";
    }
  }else{
    if($_POST['mechanic_email'] == ''){
      echo "<script>alert('mechanic_email is missing')</script>";
    }else if($_POST['mechanic_password'] == ''){
      echo "<script>alert('mechanic password is missing')</script>";
    }
  }
}


?>