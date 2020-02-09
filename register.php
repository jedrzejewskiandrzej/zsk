<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SmAnSm</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body class="reg_sign_back">

    <?php
    require_once("./scripts/connect.php");
    require_once("./functions/test_input.php");

    $name = $lastname = $login = $email = $password = $errorName = $errorLastname = $errorLogin = $errorEmail = $errorPassword = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["name"])) {
        $errorName = "Podaj imię.";
        } else {
          $name = test_input($_POST["name"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{3,}$/",$name)) {
            $errorName = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
        }else {
          $_SESSION["name"] = test_input($_POST["name"]);
        }
      }

      if (empty($_POST["lastname"])) {
        $errorLastname = "Podaj nazwisko.";
        } else {
          $lastname = test_input($_POST["lastname"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{3,}$/",$lastname)) {
            $errorLastname = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
          }else {
            $_SESSION["lastname"] = test_input($_POST["lastname"]);
          }
      }

      if (empty($_POST["login"])) {
        $errorLogin = "Podaj login.";
        }else{
            $login = test_input($_POST["login"]);
            if (!preg_match("/^.{4,}$/",$login)) {
              $errorLogin = "Minimum 4 znaki";
            }else{
              $sql_login = "SELECT `login` FROM `user`";
              $result = mysqli_query($connect, $sql_login);
              $correct=1;

              while ($row = mysqli_fetch_assoc($result)) {
                if($row['login']==$login){
                  $errorLogin =  "Podany login został już zajęty.";
                  $correct=0;
                }
              }

              if($correct==1){
                $_SESSION["login"]  = test_input($_POST["login"]);
              }
            }
        }


      if (empty($_POST["email"])) {
        $errorEmail = "Podaj email.";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorEmail = "Niepoprawny email.";
        }else{
          $sql_email = "SELECT `email` FROM `user`";
          $result = mysqli_query($connect, $sql_email);
          $correct=1;

          while ($row = mysqli_fetch_assoc($result)) {
            if($row['email']==$email){
              $errorEmail=  "Podany email został już zajęty.";
              $correct=0;
            }
          }

          if($correct==1){
            $_SESSION["email"]  = test_input($_POST["email"]);
          }
        }
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

  if(!empty($_SESSION['login']) && !empty($_SESSION['name']) && !empty($_SESSION['lastname']) && !empty($_SESSION['password']) && !empty($_SESSION['email'])){ //wystarczy sprawdzić jedno pole w związku z tym, że cały formularz jest wymagany...akurat wybrałem sonbie hasło
  header('location: ./scripts/add_user.php');
  }

}

     ?>

    <content class="col-12 dflex">
      <div class="col-6 pmid1">


    <form class="register_sign" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Register...hello</h1>
      <ul>

      <li><input type="text" name="name" maxlength="20" placeholder="Podaj imię" value="<?php echo $name;?>" autofocus>
      <?php if($errorName!= null){?> <span class="red_label"><?php echo $errorName; ?> </span> <?php } ?></li>

      <li><input type="text" name="lastname" maxlength="30" placeholder="Podaj nazwisko" value="<?php echo $lastname;?>">
      <?php if($errorLastname!= null){?> <span class="red_label"><?php echo $errorLastname; ?> </span> <?php } ?></li>

      <li><input type="text" name="login" maxlength="20" placeholder="Podaj login" value="<?php echo $login;?>">
      <?php if($errorLogin!= null){?> <span class="red_label"><?php echo $errorLogin; ?> </span> <?php } ?></li>


      <li><input type="text" name="email" maxlength="30" placeholder="Podaj email" value="<?php echo $email;?>">
      <?php if($errorEmail!= null){?> <span class="red_label"><?php echo $errorEmail; ?> </span> <?php } ?></li>

      <li><input type="password" name="password" maxlength="30" placeholder="Podaj hasło">
      <?php if($errorPassword!= null){?> <span class="red_label"><?php echo $errorPassword; ?> </span> <?php } ?></li>

      <li class="reg_sigin_ul_li_btn"><input type="submit" class="btn1" name="btn1" value="Zarejestruj"></li>

</ul>


      </div>
    </content>
  </body>

</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
    mysqli_close($conn);
?>
</style>
