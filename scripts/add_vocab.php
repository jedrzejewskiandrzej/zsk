<?php
session_start();
require_once("./connect.php");

$desc = $_SESSION['desc'];
$class = $_SESSION['class'];
$set_name = $_SESSION['set_name'];
$amount = $_SESSION['amount'];
$array_vocab_pl = $_SESSION['vocab_pl'];
$array_vocab_eng = $_SESSION['vocab_eng'];


$sql = "INSERT INTO `set`(`set_name`, `id_class`, `description`) VALUES ('$set_name','$class','$desc')";

if(mysqli_query($connect,$sql)){

  $sql = "SELECT `id_set` FROM `set` WHERE `set_name`='$set_name'";
  $result = mysqli_query($connect,$sql);

  while($row = mysqli_fetch_assoc($result)){
    $id_set = $row['id_set'];
  }

  for($i=0; $i < $amount; $i++){
    $vocab_pl = $array_vocab_pl[$i];
    $vocab_eng = $array_vocab_eng[$i];
     $sql = "INSERT INTO `vocab`(`vocab_pl`, `vocab_en`,`id_set`) VALUES (\"$vocab_pl\",\"$vocab_eng\",\"$id_set\")";
    if(mysqli_query($connect,$sql)){
      header("location:../add_stuff.php");
    }
  }
}
mysqli_close($connect);
session_destroy();
 ?>
