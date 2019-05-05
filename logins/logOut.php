<?php 

session_start();
unset($_SESSION['user']);
unset($_SESSION['mechanic_email']);
session_destroy();

header('location: ../index.php');

?>