<?php
session_start();
require_once("./connect.php");

$name = $_SESSION["name"];
$lastname = $_SESSION["lastname"];
$login = $_SESSION["login"];
$email = $_SESSION["email"];
$type = $_SESSION["type"];
$password = $_SESSION["password"];

  $sql = "INSERT INTO `user`(`name`, `lastname`, `login`, `email`, `type`, `password`) VALUES ('$name','$lastname','$login','$email','$type','$password')";
  if(mysqli_query($connect, $sql)){
    header('location: ../signin.php');
    }

mysqli_close($connect);
session_destroy();
 ?>
