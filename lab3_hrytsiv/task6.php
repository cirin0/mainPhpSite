<?php
require '../config.php';
include_once 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <link href="./css/style.css" rel="stylesheet">
   <title>Лабораторна робота №3</title>
</head>

<body>
   <div class="wrapper">
      <div class="form_container">
         <h2>Завдання 6</h2>
         <form action="" method="post">
            <label for="num">Введіть натуральне число:</label>
            <input type="text" name="num" id="num" required>
            <button type="submit">Відправити</button>
         </form>
      </div>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $number = isset($_POST["num"]) ? intval($_POST["num"]) : 0;
         if ($number > 0) {
            echo "<p>Масив квадратів перших $number натуральних чисел:</p><br>";
            generateArrayTask6($number);
         } else {
            echo "Будь ласка, введіть натуральне число.";
         }
      }
      ?>
      <div class="next_task">
         <div>
            <a href="lab3.5.php">
               << Завдання 5 |</a>
                  <a href="task7.php">| Завдання 7 >></a>
         </div>
         <a href="/index.php">Головна</a>
      </div>
   </div>
   <?php
   include_once 'task7.php';
   ?>
</body>

</html>