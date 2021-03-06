<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Zestawy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <?php
    require_once("./scripts/connect.php");
    $login = $_SESSION['login'];
     ?>
     <menu class="col-1-1 inteMenu">

       <ul class="col-12">
         <li><a href="./interface.php">Strona główna</a></li>
         <li><a href="./sets.php">Moje zestawy</a></li>

         <?php
         include './scripts/menu.php'
          ?>

       </ul>
     </menu>

        <nav class="col-9 inteNav">
          <p class="user_login">
            <?php
            $sql = "SELECT `name`,`lastname` FROM `user` WHERE `login` = \"$login\"";
            $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($result)){
              echo "Witaj ".$row['name']." ".$row['lastname'];
            }

            ?>
         </p>

          <ul>
            <li><a href="./profile.php">Mój profil</a></li>
            <li><a href="./scripts/log_out.php">Wyloguj</a></li>
          </ul>
        </nav>


        <main class="col-9 inteMain">

          <section class="col-11 dcenter sec4">

          <button type="button" class="back"><a href="./sets_edit.php">Cofnij do - Edytuj słówka</a></button>

          <h1 class="tcenter set_header">Edycja zestawu "

              <?php
              $id_set = $_GET['id_set'];
              $sql = "SELECT `set_name` FROM `set` WHERE `id_set` = $id_set";
              $result = mysqli_query($connect, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo $row['set_name'];
              }
              ?>
            "
          </h1>


              <table class="dcenter fleft col-5">
                <tr>
                  <th>PL</th>
                  <th>ENG</th>
                  <th>USUŃ</th>
                  <!-- <th>AKTUALIZUJ</th> -->
                </tr>
                <?php
                include './scripts/display_set_edit.php';
                ?>
              </table>
              <form class="dflex set_change" action="./scripts/alter_vocab.php" method="post">
                <ul>
                <?php
                $sql = "SELECT * FROM `vocab` WHERE `id_set` = $id_set";
                $result = mysqli_query($connect, $sql);
                $pom=0;

                while($row = mysqli_fetch_assoc($result)){

                  echo "<li><label for='vocab_pl[]'>PL: </label><input type='text' name='vocab_pl[]' value='$row[vocab_pl]'><label for='vocab_eng[]'>ENG: </label><input type='text' name='vocab_eng[]' value='$row[vocab_en]'></li>";
                  $pom++;
                }

                echo "<input type='hidden' name='amount' value='$pom'>";
                echo "<input type='hidden' name='id_set' value='$id_set'>";
                echo "<input type='submit' class='btn1' value='Zastosuj zmiany'>";

                 ?>
                 </ul>
              </form>

          </section>

        </main>

  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
   ?>
</style>
