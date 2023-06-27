<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
<?php
        if (isset($_SESSION['users'])) {
            header('location: profile.php'); 
            echo $_SESSION['users']['login'];
            echo $_SESSION['users']['avatar'];
            echo $_SESSION['users']['email'];
        } else {
            echo "Вы за бортом";
        }
    ?>
  <header class="header">
  </header>
  <main>
    <h1 class="zag">ЗАПИСЬ НА КОРАБЛЬ</h1>
    <br><br><br>
    <div class="ticket2">
      <form action="includes/signup.php" method="POST" class="style_ticket" enctype="multipart/form-data">
        <div class="column">
          <label class="ticket" for="">ВАШ ПОРТРЕТ</label>
          <input name="avatar" class="ticket" type="file">
        </div>
        <div class="column">
          <input class="input" name="login" id="" placeholder="Ваше прозвище">
        </div>
        <div class="column">
          <input class="input" type="email" name="email" id="" placeholder="Почтовый адрес">
        </div>
        <div class="column">
          <input class="input" type="password" name="password" id="" placeholder="Секретный пароль">
        </div>
        <div class="column">
          <input class="input" type="password" name="password_confirm" id="" placeholder="Подтвердите секретный пароль">
        </div>
        <p class="msg"><?php
                        if (isset($_SESSION['message'])) {
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                        }
                        ?> </p>



        <div class="column">
          <button type="submit" class="signed">подпись</button>
          <p> ЕСЛИ БИЛЕТ УЖЕ ЕСТЬ, <a href="index.php">ПРЕДЪЯВИТЬ</a></p>
        </div>
      </form>
    </div>


</body>

</html>