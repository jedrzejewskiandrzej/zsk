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
    </tr>
TR;
  }
}
 ?>
