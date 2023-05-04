<?php
session_start();
require_once 'connect.php';



if(isset($_SESSION['id'])) {
  echo $_SESSION['id'];
} else {
  echo "0";
  echo "SESSION: ";
  print_r($_SESSION);
}

?>

