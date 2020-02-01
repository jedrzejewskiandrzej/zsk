<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SmAnSm</title>

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

    <content>
      <div class="col-9 pmid">

        <aside class="col-5 logimg fleft">

    </aside>

    <form class="register" method="post" action="./scripts/add_user.php">
      <input type="text" name="name" placeholder="Podaj imię" autofocus><br><br>
      <input type="text" name="lastname" placeholder="Podaj nazwisko"><br><br>
      <input type="text" name="login" placeholder="Podaj login" required><br><br>
      <input type="text" name="email" placeholder="Podaj email" required><br><br>
      <input type="radio" name="type" value="s" checked>Uczen
      <input type="radio" name="type" value="t">Nauczyciel
      <input type="radio" name="type" value="a">Admin<br><br>
      <input type="password" name="password" placeholder="Podaj hasło" required><br><br>
      <input type="submit" name="btn1" value="Zarejestruj">
    </form>

      </div>
    </content>

    <footer>

    </footer>
  </body>
</html>
