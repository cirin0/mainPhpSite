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
         <h2>Завдання 1</h2>
         <form method="post">
            <label for="num1">Введіть перше число:</label>
            <input type="text" id="num1" name="num1" required>
            <label for="num2">Введіть друге число:</label>
            <input type="text" id="num2" name="num2" required>
            <button type="submit" name="submit">Submit</button>
         </form>
      </div>
      <?php
      echo '<div class="form_center">';
      if (isset($_POST['submit'])) {
         $num1 = $_POST["num1"];
         $num2 = $_POST["num2"];
         if (is_numeric($num1) && is_numeric($num2)) {
            $subtraction = $num1 - $num2;
            $multiplication = $num1 * $num2;
            $modulus = $num1 % $num2;
            echo "Результат віднімання: $num1 - $num2 = $subtraction<br>";
            echo "Результат множення: $num1 * $num2 = $multiplication<br>";
            echo "Результат залишку від ділення: $num1 % $num2 = $modulus<br>";
            echo '</div>';
         } else {
            echo "Будь ласка, введіть числові значення.";
         }
      }
      ?>
      <div class="next_task"><a href="lab2.2.php">Завдання 2</a><br> <br> <a href="/index.php">Головна</a></div>
   </div>
</body>

</html>