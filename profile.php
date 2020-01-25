<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style media="screen">
      <?php
        include './css/widescreen.css';
       ?>
    </style>
  </head>
  <body>

        <menu class="col-1-1 inteMenu">

          <ul class="col-12">
            <li><a href="interfaceUSER.php">Strona główna</a></li>
            <li><a href="set.php">Moje zestawy</a></li>
            <li><a href="#">Kategorie</a></li>
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

            <ul class="prof_ul3 fleft">
              <form class="profinfo" method="post">
                <input type="text" name="name" placeholder="Nowe imię">
                <input type="text" name="lastname" placeholder="Nowe nazwisko">
                <input type="text" name="email" placeholder="Nowy email">
                <input type="text" name="login" placeholder="Nowe login">
                <button>Zastosuj zmiany</button>
              </form>
            </ul>

            <ul class="prof_ul4 fright">
              <form class="profpass" method="post">
                <input type="password" name="pass1" placeholder="Podaj nowe hasło">
                <input type="password" name="pass2" placeholder="Potwierdź nowe hasło">
                <button type="button" name="button">Potwierdź</button>
              </form>
            </ul>

          </section>

        </main>






  </body>
</html>
