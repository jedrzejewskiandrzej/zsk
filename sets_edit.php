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



            <?php
            ob_start();
            $sql = "SELECT `id_class` FROM `user` WHERE `login` = \"$login\"";
            $result = mysqli_query($connect, $sql);
            $id_class='';
            while($row = mysqli_fetch_assoc($result)){
            $id_class = $row['id_class'];
            }

            $sql = "SELECT * FROM `set` WHERE `id_class` = \"$id_class\"";
            $result = mysqli_query($connect, $sql);
            $set_name='';
            while($row = mysqli_fetch_assoc($result)){
              $set_name=$row['set_name'];
              echo<<<div
              <div class="col-3-4">
                <p class="setName"><a href="./display_set_edit.php?id_set=$row[id_set]">$set_name</a></p>
              </div>
div;
            }

             ?>

          </section>


        </main>

  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
   ?>
</style>
