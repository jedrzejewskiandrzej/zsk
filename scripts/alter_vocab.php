<?php
session_start();
require_once("./connect.php");
$amount=$_POST['amount'];
$id_set=$_SESSION['id_set'];

$pom=0;
for($i=0; $i < $amount; $i++){
  $sql = "DELETE FROM `vocab` WHERE `vocab`.`id_set` = $id_set";
  if(mysqli_query($connect,$sql)){
    $pom++;
  }
}

if($pom==$amount){
  $pom=0;
  for($i=0; $i < $amount; $i++){
    $vocab_pl = $_POST['vocab_pl'][$i];
    $vocab_eng = $_POST['vocab_eng'][$i];
    $sql = "INSERT INTO `vocab`(`vocab_pl`, `vocab_en`,`id_set`) VALUES (\"$vocab_pl\",\"$vocab_eng\",\"$id_set\")";
    if(mysqli_query($connect,$sql)){
      $pom++;
      echo "Jest"." ".$pom;
    }
  }
  if($pom==$amount){
    header("location:../sets_edit.php");
  }

}
mysqli_close($connect);


 ?>
