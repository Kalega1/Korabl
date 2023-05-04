<?php 
session_start();
require_once 'connect.php';

// Получаем ID текущего пользователя из сессии
$user_id = $_SESSION['id']['id'];

// Делаем запрос на получение списка рыб текущего пользователя
$sql = "SELECT user_fish.*, fish.name FROM user_fish LEFT JOIN fish ON user_fish.fish_id = fish.id WHERE user_fish.user_id = $user_id";
$result = mysqli_query($connect, $sql);

// Выводим список рыб текущего пользователя
if(mysqli_num_rows($result) > 0){
    echo "<ul>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . $row['name'] . " (" . $row['quantity'] . ")" . "</li>";
    }
    echo "</ul>";
} else {
    echo "У вас пока нет рыб!";
}

// Закрываем соединение с базой данных
mysqli_close($connect);

?>

