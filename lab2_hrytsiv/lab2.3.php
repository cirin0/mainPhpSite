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
         <h2>Завдання 3</h2>
         <form method="post">
            <label for="num1">Введіть перше число:</label>
            <input type="text" id="num1" name="x" required>
            <label for="num2">Введіть друге число:</label>
            <input type="text" id="num2" name="y" required>
            <button type="submit" name="submit">Submit</button>
         </form>
      </div>
      <?php
      echo '<div class="form_center">';
      if (isset($_POST['submit'])) {
         $x = $_POST["x"];
         $y = $_POST["y"];
         echo "<div>";
         if (is_numeric($x) && is_numeric($y)) {
            if ($x > 0 && $y > 0) {
               $res = $x / $y + ($x * $y) ^ 2;
            } else if ((-$x + $y) / 2 > 0) {
               $res = $y / $x;
            } else {
               $res = $x ^ 2;
            }
            echo "<p>Введені числа: x = $x, y = $y</p>";
            echo "<p>Обчислений приклад: \"Результат: $res\"</p>";
         } else {
            echo "Будь ласка, введіть числа.";
         }
         echo "</div>";
      }
      ?>
      <div class="next_task">
         <div>
            <a href="lab2.2.php">
               << Завдання 2 |</a>
                  <a href="lab2.4.php">| Завдання 4 >></a>
         </div>
         <a href="/index.php">Головна</a>
      </div>
   </div>
</body>

</html>