<?php
session_start();

// if ($_SESSION['users']) {
//   header('location: profile.php'); 
// }
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
  <main class="main">

    <h1 class="zag">⚓️ ВХОД НА КОРАБЛЬ ⚓️</h1>
    <p class="podzag">ПРЕДЪЯВИТЕ БИЛЕТ</p>
    <br><br><br>
    <div class="ticket2">
      <form action="includes/signin.php" method="post" name="login" class="style_ticket">
        <div class="column">
          <input type="text" name="login" placeholder="Введите ваше прозвище">
        </div>
        <div class="column">

          <input  type="password" name="password" placeholder="Секретный пароль">
        </div>
        <div class="column">
          <button type="submit" class="signed">предъявить</button>
          <p> ЕСЛИ БИЛЕТА НЕТ, <a href="registration.php">ЗАПИСАТЬСЯ</a> </p>
          <p class="msg"><?php
                        if (isset($_SESSION['message'])) {
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                        }
                        ?> 
          </p>
        </div>
      </form>
    </div>

  </main>
</body>

</html>