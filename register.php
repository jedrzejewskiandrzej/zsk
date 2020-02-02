<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SmAnSm</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./css/widescreen.css">
  </head>
  <body>

    <?php
    require_once("./scripts/connect.php");

    $name = $lastname = $login = $email = $email = $type = $password = $errorName = $errorLastname = $errorLogin = $errorEmail = $errorType = $errorPassword = '';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["name"])) {
        $errorName = "Podaj imię.";
        } else {
          $name = test_input($_POST["name"]);
          if (!preg_match("/^[A-Z][a-z]{2,}$/",$name)) {
            $errorName = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
        }else {
          $_SESSION["name"] = test_input($_POST["name"]);
        }
      }

      if (empty($_POST["lastname"])) {
        $errorLastname = "Podaj nazwisko.";
        } else {
          $lastname = test_input($_POST["lastname"]);
          if (!preg_match("/^[A-Z][a-z]{2,}$/",$lastname)) {
            $errorLastname = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
          }else {
            $_SESSION["lastname"] = test_input($_POST["lastname"]);
          }
      }

      if (empty($_POST["login"])) {
        $errorLogin = "Podaj login.";
      } else {
        $login = test_input($_POST["login"]);
        if (!preg_match("/^[0-9a-zA-Z]{4,}$/",$login)) {
          $errorLogin = "Minimum 4 znaki";
        }else{
          $_SESSION["login"]  = test_input($_POST["login"]);
        }
      }

      if (empty($_POST["email"])) {
        $errorEmail = "Podaj email.";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorEmail = "Niepoprawny email";
        }else{
          $_SESSION["email"]  = test_input($_POST["email"]);
        }
      }

      if (empty($_POST["type"])) {
        $errorType = "Gender is required";
      } else {
        $type = test_input($_POST["type"]);
        $_SESSION["type"] = test_input($_POST["type"]);
      }

      if (empty($_POST["password"])) {
        $errorPassword = "Podaj hasło.";
      } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/",$password)) {
          $errorPassword = "Niepoprawne hasło. Musi zawierać małe i wielkie litery, minmum 1 znak specjalny, minium 1 cyfrę oraz co najmniej 8 znaków";
        }else{
          $_SESSION["password"] = test_input($_POST["password"]);
        }
      }

  if(!empty($_SESSION['password'])){ //wystarczy sprawdzić jedno pole w związku z tym, że cały formularz jest wymagany...akurat wybrałem sonbie hasło
  header('location: ./scripts/add_user.php');
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
     ?>

    <content>
      <div class="col-9 pmid">

        <aside class="col-5 logimg fleft">

    </aside>

    <form class="register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

      <input type="text" name="name" maxlength="20" placeholder="Podaj imię" value="<?php echo $name;?>" autofocus>
      <?php if($errorName!= null){?> <span class="red_label"><?php echo $errorName; ?> </span> <?php } ?><br><br>
      <input type="text" name="lastname" maxlength="30" placeholder="Podaj nazwisko" value="<?php echo $lastname;?>">
      <?php if($errorLastname!= null){?> <span class="red_label"><?php echo $errorLastname; ?> </span> <?php } ?><br><br>
      <input type="text" name="login" maxlength="20" placeholder="Podaj login" value="<?php echo $login;?>">
      <?php if($errorLogin!= null){?> <span class="red_label"><?php echo $errorLogin; ?> </span> <?php } ?><br><br>
      <input type="text" name="email" maxlength="30" placeholder="Podaj email" value="<?php echo $email;?>">
      <?php if($errorEmail!= null){?> <span class="red_label"><?php echo $errorEmail; ?> </span> <?php } ?><br><br>
      <input type="radio" name="type" value="s" checked>Uczen
      <input type="radio" name="type" value="t">Nauczyciel
      <input type="radio" name="type" value="a">Admin<br><br>

      <input type="password" name="password" maxlength="30" placeholder="Podaj hasło">
      <?php if($errorPassword!= null){?> <span class="red_label"><?php echo $errorPassword; ?> </span> <?php } ?><br><br>
      <input type="submit" name="btn1" value="Zarejestruj">



      </div>
    </content>

    <footer>

    </footer>
  </body>
</html>
