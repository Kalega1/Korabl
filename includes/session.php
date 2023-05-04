<?php
session_start();
require_once 'connect.php';
$_SESSION['user_id'] = $login;
?>
