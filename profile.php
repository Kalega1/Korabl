<?php
session_start();
if (!$_SESSION['id']) {
  header('location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Профиль</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body id="body">
  <header class="header">

    <br>


    <a href="includes/loguot.php" class="logout">СОЙТИ</a>
    <form>
      <div class="ticket">
        <img src="<?php echo $_SESSION['id']['avatar'] ?>" width="50" alt="">
        <div>
          <p class=""><?php echo $_SESSION['id']['login'] ?></p>
          <a href="#"><?php echo $_SESSION['id']['email'] ?></a>
        </div>
      </div>

      <br><br>
    </form>
  </header>

  <main class="main">


    <!-- <a href="includes/update_activity.php?user_id=<?php echo $user_id; ?>">Отметиться</a> -->
    <br><br>
    <button onclick="showInventory()" class="button">Ресурсы</button>
    <br><br>
    <button onclick="window.location.href='includes/get.php'" class="button">Пассажиры</button>
    <br><br>
    <button class="button" onclick="markAsActive()">Отметиться</button>
    <br><br>
    <form action='includes/fishng.php' method='post'>
      <input type='submit' name='catch_fish' value='Рыбачить' class="button">
    </form>
    <?php
    session_start();
    if (isset($_SESSION['ribalka'])) {
      echo "<p>" . $_SESSION['ribalka'] . "</p>";
      unset($_SESSION['ribalka']);
    }
    ?>

    <p class="podzag"></p>
    <br><br><br>
    <br><br>
    <br><br>
    <br><br>
  </main>
  <script>
    function changeBackgroundByTime() {
      const current_time = new Date();
      const hour = current_time.getHours();
      const body = document.getElementById('body');

      if (hour >= 6 && hour < 12) {
        body.style.backgroundImage = "url('jpg/shipem.jpg')";
      } else if (hour >= 12 && hour < 18) {
        body.style.backgroundImage = "url('jpg/ship.jpg')";
      } else if (hour >= 18 && hour < 24) {
        body.style.backgroundImage = "url('jpg/shipe.jpg')";
      } else {
        body.style.backgroundImage = "url('jpg/shipn.jpg')";
      }
    }
    window.onload = function() {
      changeBackgroundByTime();
    }
  </script>
  <footer>
    <br><br>
    <ul id="user_fish" class="inventory">
    </ul>

    <script>
      function showInventory() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("user_fish").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "includes/sklad.php", true); // указываем путь к скрипту на сервере, который будет выводить инвентарь
        xhttp.send();
      }
    </script>
    <script>
      function markAsActive() {
        // Получаем ID пользователя из сессии
        var id = "<?php echo $_SESSION['id']['id']; ?>";

        // Отправляем AJAX запрос на обновление last_activity
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log("Last activity updated!");
          }
        };
        xmlhttp.open("POST", "includes/update_last_activity.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id=" + id);
      }
    </script>
    <ul class="spisok">
      <?php foreach ($_SESSION['spisok'] as $user) : ?>
        <li class="spis2">
          <div><?php echo $user['login']; ?></div>
          <img src="<?php echo $user['avatar']; ?>" width="50">
        </li>
      <?php endforeach; ?>
    </ul>





  </footer>
</body>

</html>