<?php
$sql = "SELECT `type` FROM `user` WHERE `login` = \"$login\"";
$result = mysqli_query($connect, $sql);
while($row = mysqli_fetch_assoc($result)){
  switch ($row['type']) {
    case 't':
      echo <<< t
      <li><a href="./add_stuff.php">Dodaj materiały</a></li>
t;
      break;
      case 'a':
      echo <<< a
      <li><a href="./add_stuff.php">Dodaj materiały</a></li>
      <li><a href="./sets_edit.php">Edytuj słówka</a></li>
a;
    break;

    default:
      break;
  }
}
 ?>
