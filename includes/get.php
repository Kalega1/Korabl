<?php 
session_start();
require_once 'connect.php';

// Определяем время неактивности пользователя в минутах
$inactive_time = 5;
$current_time = date('Y-m-d H:i:s');
$inactive_since = date('Y-m-d H:i:s', strtotime('-' . $inactive_time . ' minutes', strtotime($current_time)));

// Выбираем из базы данных всех пользователей, которые были активны в течение последних $inactive_time минут
$result = mysqli_query($connect, "SELECT * FROM users WHERE last_activity >= '$inactive_since'");


// Добавляем список залогиненных пользователей в сессию
$_SESSION['spisok'] = [];
while ($row = mysqli_fetch_assoc($result)) {
    array_push($_SESSION['spisok'], [
        "id" => $row['id'],
        "login" => $row['login'],
        "avatar" => $row['avatar'],
        "email" => $row['email']
    ]);
}

// Выводим список пользователей
echo "<ul class='spisok'>";
foreach ($_SESSION['spisok'] as $id) {
    echo "<li class='spis2'>";
    echo "<div>" . $id['login'] . "</div>";
    echo "<img src='" . $id['avatar'] . "' width='50'>";
    echo "</li>";
}
echo "</ul>";


header('Location: ../profile.php');
?>
