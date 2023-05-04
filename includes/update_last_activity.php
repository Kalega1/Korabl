<?php
session_start();
require_once 'connect.php';

$user_id = $_POST['id'];

// Обновляем дату последней активности в базе данных
mysqli_query($connect, "UPDATE users SET last_activity = NOW() WHERE id = $user_id");

echo "Last activity updated!";
header('Location: ../profile.php');

?>






