<?php
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <title>Лабораторна робота №2</title>
</head>

<body>
   <div class="wrapper">
      <div class="form_container">
         <h2>Завдання 2</h2>
         <form method="post">
            <label for="x">Введіть X:</label>
            <input type="text" id="x" name="x" required>
            <label for="y">Введіть Y:</label>
            <input type="text" id="y" name="y" required>
            <label for="z">Введіть Z:</label>
            <input type="text" id="z" name="z" required>
            <button type="submit" name="submit">Submit</button>
         </form>
      </div>
      <?php
      if (isset($_POST['submit'])) {
         $x = $_POST["x"];
         $y = $_POST["y"];
         $z = $_POST["z"];
         echo "<div>";
         if (is_numeric($x) && is_numeric($y) && is_numeric($z) && $x > 0 && $y > 0 && $z > 0) {
            $F = 2 * $x + 3 * $y - $z;
            echo "<p>Вираз що перевіряється: F = 2x + 3y – z</p>";
            echo "<p>Введені числа: x = $x, y = $y, z = $z</p>";
            echo "<p>Обчислений приклад: \"2 * $x + 3 * $y – $z = $F\"</p>";
         } else {
            echo "Будь ласка, введіть натуральні числа.";
         }
         echo "</div>";
      }
      ?>
      <div class="next_task"><a href="lab2.3.php">Завдання 3</a><br> <br> <a href="/index.php">Головна</a></div>
   </div>
</body>

</html>