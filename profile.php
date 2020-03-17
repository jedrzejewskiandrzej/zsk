<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <?php
    require_once("./scripts/connect.php");
    require_once("./functions/test_input.php");

    $login = $_SESSION['login'];
    $sql = "SELECT `id_user` FROM `user` WHERE `login` = \"$login\"";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['id_user'] = $row['id_user'];


    $name_change = $lastname_change = $login_change = $email_change = $password1 = $password2 = $errorName = $errorLastname = $errorLogin = $errorEmail = $errorPassword1 = $errorPassword2 = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["name"])) {
        $errorName = "Podaj imię.";
        } else {
          $name_change = test_input($_POST["name"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{3,}$/",$name_change)) {
            $errorName = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
        }else {
          $_SESSION["name_change"] = test_input($_POST["name"]);
        }
      }

      if (empty($_POST["lastname"])) {
        $errorLastname = "Podaj nazwisko.";
        } else {
          $lastname_change = test_input($_POST["lastname"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{3,}$/",$lastname_change)) {
            $errorLastname = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
          }else {
            $_SESSION["lastname_change"] = test_input($_POST["lastname"]);
          }
      }

      if (empty($_POST["login"])) {
        $errorLogin = "Podaj login.";
        }else{
            $login_change = test_input($_POST["login"]);
            if (!preg_match("/^.{4,}$/",$login_change)) {
              $errorLogin = "Minimum 4 znaki";
            }else{
              $sql_login = "SELECT `login` FROM `user`";
              $result = mysqli_query($connect, $sql_login);
              $correct=1;

              while ($row = mysqli_fetch_assoc($result)) {
                if($row['login']==$login_change){
                  $errorLogin =  "Podany login został już zajęty.";
                  $correct=0;
                }
              }

              if($correct==1){
                $_SESSION["login_change"]  = test_input($_POST["login"]);
              }
            }
        }


      if (empty($_POST["email"])) {
        $errorEmail = "Podaj email.";
      } else {
        $email_change = test_input($_POST["email"]);
        if (!filter_var($email_change, FILTER_VALIDATE_EMAIL)) {
          $errorEmail = "Niepoprawny email.";
        }else{
          $sql_email = "SELECT `email` FROM `user`";
          $result = mysqli_query($connect, $sql_email);
          $correct=1;

          while ($row = mysqli_fetch_assoc($result)) {
            if($row['email']==$email_change){
              $errorEmail=  "Podany email został już zajęty.";
              $correct=0;
            }
          }

          if($correct==1){
            $_SESSION["email_change"]  = test_input($_POST["email"]);
          }
        }
      }

     if (empty($_POST["password1"])){
        $errorPassword1 = $errorPassword2 = "Wypełnij oba pola.";
      }else{
        $password1 = test_input($_POST["password1"]);
        $password2 = test_input($_POST["password2"]);
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/",$password1)) {
          $errorPassword1 = "Niepoprawne hasło. Musi zawierać małe i wielkie litery, minmum 1 znak specjalny, minium 1 cyfrę oraz co najmniej 8 znaków";
        }else{
          if($password1!=$password2){
            $errorPassword1 = "Hasła muszą być idenycznczne.";
          }else{
            $_SESSION["password_change"] = test_input($_POST["password1"]);
          }
        }
      }

  if(!empty($_SESSION['login_change']) && !empty($_SESSION['name_change']) && !empty($_SESSION['lastname_change']) && !empty($_SESSION['password_change']) && !empty($_SESSION['email_change'])){
  header('location: ./scripts/alter_user.php');
  }

}

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
          <p class="user_login fleft">
            <?php

            $sql = "SELECT `name`,`lastname` FROM `user` WHERE `login` = \"$login\"";
            $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($result)){
              echo "Witaj ".$row['name']." ".$row['lastname'];
            }

            ?>
          <ul>
            <li><a href="profile.php">Mój profil</a></li>
            <li><a href="./scripts/log_out.php">Wyloguj</a></li>
          </ul>
        </nav>

        <main class="col-9 inteMain">

          <section class="profile_content">

            <div class="profile_info col-6 fleft">

              <ul class="fleft">
                <li>Imię:</li>
                <li>Nazwisko:</li>
                <li>Email:</li>
                <li>Login:</li>
              </ul>

              <ul class="fright">
                  <?php
                  $login = $_SESSION['login'];
                  $sql = "SELECT `name`,`lastname`,`email`,`login` FROM `user` WHERE `login` = \"$login\"";
                  $result = mysqli_query($connect, $sql);

                  while($row = mysqli_fetch_assoc($result)){
                    echo<<<LI
                    <li class="ditalic">$row[name]</li>
                    <li class="ditalic">$row[lastname]</li>
                    <li class="ditalic">$row[email]</li>
                    <li class="ditalic">$row[login]</li>
LI;
                  }

                  ?>
                </ul>

            </div>


            <div class="profile_form col-6 fright">
              <form class="change_form" method="post" autocomplete="off">
                <h3>Zmiana danych</h3>
                <ul>
                  <li><input type="text" name="name" maxlength="20" placeholder="Podaj imię" value="<?php echo $name_change?>" >
                  <?php if($errorName!= null){?> <span class="red_label"><?php echo $errorName; ?> </span> <?php } ?></li>

                  <li><input type="text" name="lastname" maxlength="30" placeholder="Podaj nazwisko" value="<?php echo $lastname_change?>">
                  <?php if($errorLastname!= null){?> <span class="red_label"><?php echo $errorLastname; ?> </span> <?php } ?></li>

                  <li><input type="text" name="login" maxlength="20" placeholder="Podaj login" value="<?php echo $login_change?>">
                  <?php if($errorLogin!= null){?> <span class="red_label"><?php echo $errorLogin; ?> </span> <?php } ?></li>

                  <li><input type="text" name="email" maxlength="30" placeholder="Podaj email" value="<?php echo $email_change?>">
                  <?php if($errorEmail!= null){?> <span class="red_label"><?php echo $errorEmail; ?> </span> <?php } ?></li>

                  <li><input type="password" name="password1" maxlength="30" placeholder="Nowe hasło">
                  <?php if($errorPassword1!= null){?> <span class="red_label"><?php echo $errorPassword1; ?> </span> <?php } ?></li>

                  <li><input type="password" name="password2" maxlength="30" placeholder="Potwierdź hasło">
                  <?php if($errorPassword2!= null){?> <span class="red_label"><?php echo $errorPassword2; ?> </span> <?php } ?></li>


                  <li class="change_from_btn"><input type="submit" class="btn1" name="btn1" value="Zastosuj zmiany"></li>
                  <p class="ditalic">*Po zastsowaniu zmian nastąpi wylogowanie i potrzeba ponownego zalogowania</p>
                </ul>
              </form>
            </div>
          </section>
        </main>
  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
    mysqli_close($conn);
   ?>
</style>
