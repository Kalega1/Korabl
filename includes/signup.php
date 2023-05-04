<?php 
session_start();
require_once 'connect.php';

$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


if ($password == $password_confirm) {
    //$_FILES['avatar']['name']
    $path = 'uploads/' . time() . $_FILES['avatar']['login'];
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'ОШИБКА ПРИ ЗАГРУЗКЕ';
        header('Location: ../registration.php');
        exit();
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO users (`id`,`login`, email, password, `avatar`) VALUES (NULL, '$login', '$email', '$hashed_password', '$path');");
    

    $_SESSION['message'] = 'ЗАПИСЬ НА КОРАБЛЬ ПРОШЛА УСПЕШНО';
    header('Location: ../index.php');
    exit();
} else {
    $_SESSION['message'] = 'ПАРОЛИ НЕ СОВПАДАЮТ';
    header('Location: ../registration.php');
    exit();
}



?>
