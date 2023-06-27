<?php
session_start();
require_once 'connect.php';

$user_id = $_SESSION['id']['id'];


if (isset($_POST['catch_fish'])) {
    $rand_num = rand(1, 100);
    if ($rand_num == 1) {
        $fish_id = 7;
    } else {
        $fish_id = rand(1, 6);
    }
    $quantity = 1;

    

    $check_sql = "SELECT * FROM user_fish WHERE user_id='$user_id' AND fish_id='$fish_id'";
    $check_result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $update_sql = "UPDATE user_fish SET quantity = quantity + 1 WHERE user_id='$user_id' AND fish_id='$fish_id'";
        $update_result = mysqli_query($connect, $update_sql);

        if ($update_result) {
            $_SESSION['ribalka'] = 'Вы поймали рыбу';

        } else {
            $_SESSION['ribalka'] = 'Ошибка при попытке добавить рыбу в инвентарь!';
        }
    } else {
        $add_sql = "INSERT INTO user_fish (user_id, fish_id, quantity) VALUES ('$user_id', '$fish_id', '$quantity')";
        $add_result = mysqli_query($connect, $add_sql);

        if ($add_result) {
            $_SESSION['ribalka'] = "<p>Вы поймали новую рыбу!</p>";
        } else {
            $_SESSION['ribalka'] = "<p>Ошибка при попытке поймать новую рыбу!</p>";
        }
    }
}
header('Location: ../profile.php');
