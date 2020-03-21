<?php

$sql = "SELECT `id_vocab` FROM `vocab`";
$result = mysqli_query($connect, $sql);
$id_vocab = [];
$temp=0;
$random_word='';

while($row = mysqli_fetch_assoc($result)){
  $id_vocab[$temp]=$row['id_vocab'];
  $temp++;
}
$lentgh=$temp;
$generated = rand(0,($temp-1));


$sql = "SELECT `vocab_en` FROM `vocab` WHERE `id_vocab`=$id_vocab[$generated]";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($result)){
$random_word = strtoupper($row['vocab_en']);
}
 ?>
