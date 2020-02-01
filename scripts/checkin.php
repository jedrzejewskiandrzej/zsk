<?php
  require_once("./connect.php");

  if(isset($_POST['btn1']) && isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT `password` FROM `user` WHERE `login` = \"$login\"";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['password'] == $password){
      header('location: ../interfaceUSER.php');
    }
  }
  mysqli_close($connect);
 ?>
