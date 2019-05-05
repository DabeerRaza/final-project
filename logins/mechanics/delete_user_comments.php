<?php 

require('../connection.php');

$id = $_GET['id'];

$delQuery = mysqli_query($conn, "DELETE FROM comments WHERE id = '$id' ");
header('Location: mechanic.php');

?>