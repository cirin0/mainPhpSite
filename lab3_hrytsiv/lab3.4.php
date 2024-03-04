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
<div class="wrapper">
   <?php
   echo "<div>";

   echo "<h3>Парні числа від 0 до 20:</h3>";
   for ($i = 0; $i <= 20; $i += 2) {
      echo $i . " ";
   }
   echo "<br>";
   echo "</div>";
   echo "<div>";
   echo "<h3>Кількість ударів годинника від 00 год. до 15 год.:</h3>";
   for ($hour = 0; $hour <= 15; $hour++) {
      echo "Година $hour:00  $hour ударів годинника<br />";
   }
   echo "<br>";
   echo "</div>";
   echo "<div>";
   echo "<h3>Ряд Фібоначчі</h3>";
   $start = 5;
   $end = 20;
   $count = 0;

   for ($i = $start; $i <= $end; $i++) {
      $fibNumber = fibonacci($i);
      echo "Член $i ряду Фібоначчі: $fibNumber" . "<br>";
      $count++;
   }
   echo "<br>";
   echo "Загальна кількість членів ряду: $count" . "<br>";
   echo "</div>";
   ?>
   <div class="next_task">
      <div>
         <a href="lab3.3.php">
            << Завдання 3 |</a>
               <a href="lab3.5.php">| Завдання 5 >></a>
      </div>
      <a href="/index.php">Головна</a>
   </div>
</div>

</html>