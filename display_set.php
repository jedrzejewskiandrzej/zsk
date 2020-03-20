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
         <li><a href="#">Szybka powtórka</a></li>

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
            <li><a href="profile.php">Mój profil</a></li>
            <li><a href="./scripts/log_out.php">Wyloguj</a></li>
          </ul>
        </nav>


        <main class="col-9 inteMain">

          <section class="col-11 dcenter sec4">
          <button type="button" class="back"><a href="./sets.php">Zestawy</a></button>
              <table class="dcenter">
                <tr>
                  <th>PL</th>
                  <th>ENG</th>
                </tr>
                <?php
                include './scripts/display_set.php';
                ?>
              </table>

          </section>

        </main>

  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
   ?>
</style>
