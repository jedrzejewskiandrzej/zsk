<?php
session_start();
require_once("./connect.php");

$id = $_SESSION['id_user'];
$name = $_SESSION['name_change'];
$lastname = $_SESSION['lastname_change'];
$login = $_SESSION['login_change'];
$email = $_SESSION['email_change'];
$password = $_SESSION['password_change'];

$sql = "UPDATE `user` SET `name`=\"$name\",`lastname`=\"$lastname\",`login`=\"$login\",`email`=\"$email\",`password`=\"$password\" WHERE `id_user`=$id";
if(mysqli_query($connect, $sql)){
  header('location: ../signin.php');
  }
mysqli_close($connect);
session_destroy();
 ?>
