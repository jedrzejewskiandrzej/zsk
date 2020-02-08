<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Interfejs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style media="screen">
      <?php
        include './css/widescreen.css';
       ?>
    </style>

  </head>
  <body>
    <?php
    require_once("./scripts/connect.php");
     ?>
        <menu class="col-1-1 inteMenu">

          <ul class="col-12">
            <li><a href="interfaceADMIN.php">Strona główna</a></li>
            <li><a href="setUSER.php">Moje zestawy</a></li>
            <li><a href="#">Kategorie</a></li>
            <li><a href="#">Szybka powtórka</a></li>
            <li><a href="#">Dodaj materiały</a></li>
            <li><a href="#">Zarządzaj</a></li>
          </ul>
        </menu>

        <nav class="col-9 inteNav">
          <p class="user_login fleft">
            <?php
            $login = $_SESSION['login'];
            $sql = "SELECT `name`,`lastname` FROM `user` WHERE `login` = \"$login\"";
            $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($result)){
              echo "Witaj ".$row['name']." ".$row['lastname'];
            }

            ?>
          <ul>
            <li><a href="profile.php">Mój profil</a></li>
            <li><a href="signin.php">Wyloguj</a></li>
          </ul>
        </nav>

        <main class="col-9 inteMain">

          <section class="col-12 sec1">

            <div class="col-3-2">
              <p class="headpar">Losowe słówko</p>
              <p class="midpar">BLA</p>
            </div>

            <div class="col-3-2">
              <p class="headpar">Ostatnia zestaw</p>
              <p class="midpar">BLA</p>
            </div>

            <div class="col-3-2">

              <p class="headpar">Ulubiona kategoria</p>
              <p class="midpar">BLA</p>
            </div>

          </section>




        </main>






  </body>
</html>
