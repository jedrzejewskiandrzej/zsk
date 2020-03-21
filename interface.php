<?php
session_start();
if(!isset($_SESSION['login'])){
  header('location: ./signin.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Interfejs</title>
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

        <nav class="col-9 inteNav ">
          <p class="user_login">
            <?php
            $sql = "SELECT `name`,`lastname` FROM `user` WHERE `login` = \"$login\"";
            $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($result)){
              echo "Witaj ".$row['name']." ".$row['lastname'];
            }

            ?>
         </p>

          <ul class="fright">
            <li><a href="./profile.php">Mój profil</a></li>
            <li><a href="./scripts/log_out.php">Wyloguj</a></li>
          </ul>
        </nav>

        <main class="col-9 inteMain">

          <section class="col-12 sec1">

            <div class="col-3-2">
              <p class="headpar">Losowe słówko</p>
              <p class="midpar"><?php
              include './scripts/random_vocab.php';
              echo $random_word ?></p>
            </div>

            <div class="col-3-2">
              <p class="headpar">Ostatni zestaw</p>
              <p class="midpar"><?php
              include './scripts/latest_set.php';

              echo "<a href='./display_set.php?id_set=$id_set'>$latest_set</a>";
               ?></p>
            </div>

            <div class="col-3-2">
              <p class="headpar">Ulubiona kategoria</p>
              <p class="midpar">BLA</p>
            </div>

          </section>

        </main>
  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
   ?>
</style>
