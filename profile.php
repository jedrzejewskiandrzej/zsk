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

        <menu class="col-1-1 inteMenu">
          <img src="./images/img.jpg" alt="Supeł logo">
          <ul class="col-12">
            <li><a href="interface.php">Strona główna</a></li>
            <li><a href="#">Moje zestawy</a></li>
            <li><a href="#">Kategorie</a></li>
            <li><a href="#">Szybka powtórka</a></li>
          </ul>
        </menu>

        <nav class="col-9 inteNav">
          <ul>
            <li><a href="#">Powiadomienia</a></li>
            <li><a href="#">Napisz wiadomość</a></li>
            <li><a href="profile.php">Mój profil</a></li>
            <li><a href="#">Zmień hasło</a></li>
            <li><a href="#">Wyloguj</a></li>
          </ul>
        </nav>

        <main class="col-9 inteMain">

          <section  class="profimg">
            <div class="proflvl">
              15
            </div>
          </section>

          <section class="profcon">

            <ul class="prof_ul1 fleft">
              <li>Imię:</li>
              <li>Nazwisko:</li>
              <li>Email:</li>
              <li>Login:</li>
            </ul>

            <ul class="prof_ul2 fleft ">
              <li id="name">Paweł</li>
              <li id="lastname">Kowalski</li>
              <li id="email">pawel.kowalski@mail.com</li>
              <li id="login">pawel123</li>
            </ul>

            <ul class="prof_ul3 fright">
              <li><input type="text" name="name" placeholder="nowe imię"></li>
              <li><input type="text" name="lastname" placeholder="nowe nazwisko"></li>
              <li><input type="text" name="email" placeholder="nowy email"></li>
              <li><input type="text" name="login" placeholder="nowe login"></li>
              <li><button>Zastosuj zmiany</button></li>
            </ul>

          </section>

        </main>






  </body>
</html>
