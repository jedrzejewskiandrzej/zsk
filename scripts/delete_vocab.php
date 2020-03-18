<?php
if(isset($_GET['id_vocab'])){
  $id_vocab = $_GET['id_vocab'];
  require_once("./connect.php");
  $sql = "DELETE FROM `vocab` WHERE `vocab`.`id_vocab` = $id_vocab";
  if(mysqli_query($connect, $sql)){
    header('location: ../sets_edit.php');
  }
}
 ?>
