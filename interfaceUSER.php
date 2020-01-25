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
    <script>
    <?php
      include './js/script.js';
     ?>
    </script>
  </head>
  <body onload="move()">

        <menu class="col-1-1 inteMenu">

          <ul class="col-12">
            <li><a href="interfaceUSER.php">Strona główna</a></li>
            <li><a href="setUSER.php">Moje zestawy</a></li>
            <li><a href="#">Szybka powtórka</a></li>
          </ul>
        </menu>

        <nav class="col-9 inteNav">
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


          <section class="col-12 sec2">
            <div class="col-12">

              <div class="progressBarBack">
                <div id="myBar" class="progressBarFront">
                  20%
                </div>
              </div>

            </div>
          </section>

        </main>





  </body>
</html>
