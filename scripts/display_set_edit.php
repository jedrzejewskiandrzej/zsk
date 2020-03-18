<?php
if(isset($_GET['id_set'])){
  $id_set = $_GET['id_set'];
  $_SESSION['id_set'] = $id_set;

  $sql = "SELECT * FROM `vocab` WHERE `id_set` = $id_set";

  $result = mysqli_query($connect, $sql);

  while($row = mysqli_fetch_assoc($result)){
    $id_vocab = $row['id_vocab'];
    echo <<<TR
    <tr>
      <td>$row[vocab_pl]</td>
      <td>$row[vocab_en]</td>
      <td><a href="./scripts/delete_vocab.php?id_vocab=$id_vocab">usuń</a></td>
    </tr>
TR;
// <td><a href="./scripts/alter_vocab.php?id_vocab=$id_vocab">aktualizuj</a></td>
  }
}
 ?>
