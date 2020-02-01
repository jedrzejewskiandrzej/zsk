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

    <content>
      <div class="col-9 pmid">

        <aside class="col-5 logimg fleft">

    </aside>

    <form class="register" action="./scripts/checkin.php" method="post">
<input type="text" name="login" placeholder="Podaj login" required><br><br>
<input type="password" name="password" placeholder="Podaj hasło" required><br><br>
<input type="submit" name="btn1" value="Zaloguj"><br>
<a href="./register.php">Zarejestruj się</a>
    </form>

      </div>
    </content>

    <footer>

    </footer>
  </body>
</html>
