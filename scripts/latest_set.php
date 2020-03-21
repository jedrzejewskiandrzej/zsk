<?php
$sql = "SELECT `id_set`,`date` FROM `set`";
$result = mysqli_query($connect, $sql);
$date_set= [];
$temp=0;
$latest_set='';
$latest_date='';

while($row = mysqli_fetch_assoc($result)){
  $date_set[$temp]=$row['date'];
  $temp++;
}
$lentgh=($temp-1);
$latest_date=max($date_set);



$sql = "SELECT `set_name`,`id_set` FROM `set` WHERE `date`=\"$latest_date\"";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($result)){
$latest_set=$row['set_name'];
$id_set=$row['id_set'];
}

 ?>
