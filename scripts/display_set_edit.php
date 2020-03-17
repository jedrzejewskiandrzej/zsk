<?php
if(isset($_GET['id_set'])){
  $id_set = $_GET['id_set'];


  $sql = "SELECT * FROM `vocab` WHERE `id_set` = $id_set";
  $result = mysqli_query($connect, $sql);

  while($row = mysqli_fetch_assoc($result)){
    echo <<<TR
    <tr>
      <td>$row[vocab_pl]</td>
      <td>$row[vocab_en]</td>
      <td><a href="./scripts/delete_vocab.php?id_set=$id_set">usuń</a></td>
      <td><a href="./scripts/alter_vocab.php?id_set=$id_set">aktualizuj</a></td>
    </tr>
TR;
  }
}
 ?>
