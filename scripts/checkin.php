<?php
session_start();
require_once("./connect.php");

$login = $_SESSION['login'];
$password = $_SESSION['password'];

$sql = "SELECT `password` FROM `user` WHERE `login` = \"$login\"";
$sql_type = "SELECT `type` FROM `user` WHERE `login` = \"$login\"";

$result = mysqli_query($connect, $sql);
$result_type = mysqli_query($connect, $sql_type);

$row = mysqli_fetch_assoc($result);
$row_type = mysqli_fetch_assoc($result_type);

if($row['password'] == $password){
  if($row_type['type'] == 's'){
    header('location: ../interfaceUSER.php');
  } else if ($row_type['type'] == 't') {
    header('location: ../interfaceTEACHER.php');
  }else{
    header('location: ../interfaceADMIN.php');
  }
}else{

  header('location: ../signin.php');

}
mysqli_close($connect);

 ?>
