<?php
session_start()
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

    $login = $password = $errorLogin = $errorPassword = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["login"])) {
        $errorLogin = "Podaj login.";
      } else {
        $login = test_input($_POST["login"]);
        if (!preg_match("/^.{4,}$/",$login)) {
          $errorLogin = "Minimum 4 znaki";
        }else{
          $_SESSION["login"]  = test_input($_POST["login"]);
        }
      }

      if (empty($_POST["password"])) {
        $errorPassword = "Podaj hasło.";
      } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[\!\@\#\$\%\^\&\*\(\)\_\+\-\=])(?=.*[A-Z])(?!.*\s).{8,}$/",$password)) {
          $errorPassword = "Niepoprawne hasło. Musi zawierać małe i wielkie litery, minmum 1 znak specjalny, minium 1 cyfrę oraz co najmniej 8 znaków";
        }else{

          $sql = "SELECT `password` FROM `user` WHERE `login` = \"$login\" ";
          $result = mysqli_query($connect, $sql);
          $correct=1;

          $row = mysqli_fetch_assoc($result);

          if($row['password']!=$password){
            $errorPassword = "Złe hasło";
            $correct=0;
          }


          if($correct==1){
            $_SESSION["password"] = test_input($_POST["password"]);
          }
        }
      }

  if(!empty($_SESSION['password'])){ //wystarczy sprawdzić jedno pole w związku z tym, że cały formularz jest wymagany...akurat wybrałem sonbie hasło
  header('location: ./scripts/checkin.php');
  }

}
?>

    <content class="col-12 dflex">
      <div class="col-6 pmid2">
        <form class="register_sign" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <h1>Sign in</h1>

          <ul>

          <li><input type="text" name="login" maxlength="20" placeholder="Podaj login" value="<?php echo $login;?>">
          <?php if($errorLogin!= null){?> <span class="red_label"><?php echo $errorLogin; ?> </span> <?php } ?></li>

          <li><input type="password" name="password" maxlength="30" placeholder="Podaj hasło">
          <?php if($errorPassword!= null){?> <span class="red_label"><?php echo $errorPassword; ?> </span> <?php } ?></li>

          <li class="reg_sigin_ul_li_btn"><input type="submit" class="btn1" name="btn1" value="Zaloguj się"></li>
          </ul>

          <a class="fright" href="./register.php">Nie masz jeszcze konta?</a>
        </form>

      </div>
    </content>
  </body>
</html>
<style media="screen">
  <?php
    include './css/widescreen.css';
   ?>
</style>
