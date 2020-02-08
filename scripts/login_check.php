<?php
session_start();
require_once("./connect.php");
require_once("../functions/test_input.php");



$sql = "SELECT `login` FROM `user`";
$result = mysqli_query($connect, $sql);
$correct=1;

while ($row = mysqli_fetch_assoc($result)) {
  if($row['login']==$login){
    $_SESSION["errorLogin2"] =  "Podany login został już zajęty.";
    $correct=0;
  }
}

if($correct==1){
  $_SESSION["login"]  = test_input($_POST["login"]);
}
header('location: ../register.php');
 ?>
