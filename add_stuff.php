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

    $set_name=$class=$amount=$desc=$errorSetName=$errorAmount=$errorDesc='';
    $supp =0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $_SESSION['class']=$_POST['class'];
      $_SESSION['amount']= $_POST['amount'];
      $array_vocab_pl=[];
      $array_vocab_eng=[];

      if (empty($_POST["set_name"])) {
        $errorSetName = "Podaj nazwę zastawu.";
        }else{
              $set_name= $_POST['set_name'];
              $sql = "SELECT `set_name` FROM `set`";
              $result = mysqli_query($connect, $sql);
              $correct=1;

              while ($row = mysqli_fetch_assoc($result)) {
                if($row['set_name']==$set_name){
                  $errorSetName = "Zestaw o tej nazwie już istnieje w tej klasie.";
                  $correct=0;
                }
              }

              if($correct==1){
                $supp++;
                $_SESSION['set_name'] = $set_name;
              }
            }

        if(empty($_POST['amount'])){
          $errorAmount = "Podaj liczbę";
        }else if($_POST['amount']>15 || $_POST['amount']<0){
          $errorAmount = "Liczba musi należeć do przedziału do 5 do 15";
        }else{
          $amount =$_POST["amount"];
          $supp++;
        }

        if(empty($_POST['desc'])){
          $errorDesc = "Podaj opis";
        }else{
          $desc = $_POST['desc'];
          $_SESSION['desc']= $_POST['desc'];
          $supp++;
        }

        for( $i=0; $i<$amount;$i++){
          @$array_vocab_pl[$i] = $_POST['vocab_pl'][$i];
          @$array_vocab_eng[$i] = $_POST['vocab_eng'][$i];
        }

        $_SESSION['vocab_pl'] = $array_vocab_pl;
        $_SESSION['vocab_eng'] = $array_vocab_eng;

        }



     ?>
     <menu class="col-1-1 inteMenu">

       <ul class="col-12">
         <li><a href="./interface.php">Strona główna</a></li>
         <li><a href="./sets.php">Moje zestawy</a></li>

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
            <li><a href="./profile.php">Mój profil</a></li>
            <li><a href="./scripts/log_out.php">Wyloguj</a></li>
          </ul>
        </nav>

        <main class="col-9 inteMain">

          <section class="set_add_content">
            <?php
            ob_start();
            ?>

            <form class="change_form_second"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
              <h3>Dodawanie zestawu</h3>
              <ul>
                <li>
                  <input type="text" name="set_name" placeholder="Nazwa zestawu" value="<?php echo $set_name?>">
                </li>
                <?php if($errorSetName!= null){?> <li><span class="red_label"><?php echo $errorSetName; ?> </span></li><br> <?php } ?>

                <li>
                  <label for="class">Klasa:</label><select class="" name="class" placeholder="Nazwa klasy" value"<?php echo $class?>">

                  <?php
                  $sql = "SELECT `id_class` from `class`";
                  $result = mysqli_query($connect, $sql);
                  mysqli_close($connect);

                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value=\"$row[id_class]\">$row[id_class]</option>";
                  }
                   ?>
                  </select>
                </li>

                <li>
                  <input type="text" name="desc"  placeholder="Opis" value="<?php echo $desc?>">
                </li>
                <?php if($errorDesc!= null){?> <li><span class="red_label"><?php echo $errorDesc; ?> </span></li><br> <?php } ?>

                <li>
                  <input type="number" name="amount" placeholder="Ilość słówek" value="<?php echo $amount?>">
                </li>
                <?php if($errorAmount!= null){?> <li><span class="red_label"><?php echo $errorAmount; ?> </span></li><br> <?php } ?>
                <?php
                if($supp == 0){
                  echo "<li class='change_from_btn'><input type='submit' class='btn1 bigger' name='btn1' value='Zastosuj zmiany'></li>";
                }else{

                  for ($i=1; $i <= $amount; $i++) {
                    echo "<li><label for='vocab_pl[]'>PL: </label><input type='text' name='vocab_pl[]'><label for='vocab_eng[]'>ENG: </label><input type='text' name='vocab_eng[]'><li>";
                  }
                  echo "<li class='change_from_btn'><input type='submit' class='btn1 bigger' name='btn2' value='Zastosuj zmiany'></li>";
                }

                 ?>
              </ul>
            </form>

            <?php
            if(isset($_POST['btn2'])){
              header("location: ./scripts/add_vocab.php");
            }
             ?>


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
