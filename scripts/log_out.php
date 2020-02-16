<?php
session_start();
header('location: ../signin.php');
unset($_SESSION);
session_destroy();
 ?>
