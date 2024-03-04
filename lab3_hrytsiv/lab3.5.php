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
   $arrTask = [2, 4, 3, 7, 12, 10, 14, 9, 45, 23, 58, 61];
   printArray($arrTask);
   echo "</div>";
   echo "<div>";
   $a = 15; // Змініть це значення на потрібне вам
   $array = generateArray($a);
   printArrayAndMinAndLast($array);
   echo "</div>";
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