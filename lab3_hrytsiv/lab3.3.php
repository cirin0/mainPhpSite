<?php
require '../config.php';
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
<div class="wrapper">
   <?php
   $numbers = [5, 14, 50, 17, 9];
   echo "<h3>Числа та їх квадрати:</h3>";
   echo "<ul>";
   foreach ($numbers as $number) {
      echo "<li>$number^2 = " . $number ** 2 . "</li>";
   }
   echo "</ul>";
   ?>
   <div class="next_task">
      <div>
         <a href="example2.php">
            << Завдання 2 |</a>
               <a href="lab3.4.php">| Завдання 4 >></a>
      </div>
      <a href="/index.php">Головна</a>
   </div>
</div>

</html>