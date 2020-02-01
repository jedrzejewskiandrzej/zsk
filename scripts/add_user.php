<?php
require_once("./connect.php");

if(isset($_POST['btn1']) && isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['type']) && isset($_POST['password'])){
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $login = $_POST['login'];
  $email = $_POST['email'];
  $type = $_POST['type'];
  $password = $_POST['password'];
  echo $name." ".$lastname." ".$login." ".$email." ".$type." ".$password;

  $sql = "INSERT INTO `user`(`name`, `lastname`, `login`, `email`, `type`, `password`) VALUES ('$name','$lastname','$login','$email','$type','$password')";
  if(mysqli_query($connect, $sql)){
    //echo "Poprawnie dodano usera";
    header('location: ../signin.php');
    }
}
mysqli_close($connect);
 ?>
