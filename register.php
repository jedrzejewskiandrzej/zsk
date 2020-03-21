<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SmAnSm</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body class="reg_sign_back">

    <?php
    require_once("./scripts/connect.php");
    require_once("./functions/test_input.php");

    $name = $lastname = $login = $email = $password1 = $password2 = $errorName = $errorLastname = $errorLogin = $errorEmail = $errorPassword1 = $errorPassword2 = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["name"])) {
        $errorName = "Podaj imię.";
        } else {
          $name = test_input($_POST["name"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{2,}$/",$name)) {
            $errorName = "Upewnij się, że zacząłeś wielką literą i użyłeś tylko liter.";
        }else {
          $_SESSION["name"] = test_input($_POST["name"]);
        }
      }

      if (empty($_POST["lastname"])) {
        $errorLastname = "Podaj nazwisko.";
        } else {
          $lastname = test_input($_POST["lastname"]);
          if (!preg_match("/^[A-Z][a-ząęćżźńłóś]{2,}$/",$lastname)) {
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
             $_SESSION["password"] = test_input($_POST["password1"]);
           }
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

        <?php if($errorName!= null){?> <li class="red_label"><?php echo $errorName; ?> </li> <?php } ?>
      <li><input type="text" name="name" maxlength="20" placeholder="Podaj imię" value="<?php echo $name;?>" autofocus></li>

      <?php if($errorLastname!= null){?> <li class="red_label"><?php echo $errorLastname; ?> </li> <?php } ?>
      <li><input type="text" name="lastname" maxlength="30" placeholder="Podaj nazwisko" value="<?php echo $lastname;?>"></li>

      <?php if($errorLogin!= null){?> <li class="red_label"><?php echo $errorLogin; ?> </li> <?php } ?>
      <li><input type="text" name="login" maxlength="20" placeholder="Podaj login" value="<?php echo $login;?>"></li>

      <?php if($errorEmail!= null){?> <li class="red_label"><?php echo $errorEmail; ?> </li> <?php } ?>
      <li><input type="text" name="email" maxlength="30" placeholder="Podaj email" value="<?php echo $email;?>"></li>

      <?php if($errorPassword1!= null){?> <li class="red_label"><?php echo $errorPassword1; ?> </li> <?php } ?>
      <li><input type="password" name="password1" maxlength="30" placeholder="Nowe hasło"></li>

      <?php if($errorPassword2!= null){?> <li class="red_label"><?php echo $errorPassword2; ?> </li> <?php } ?>
        <li><input type="password" name="password2" maxlength="30" placeholder="Potwierdź hasło"></li>

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
