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
   echo "<br>";
   echo "<div>";
   echo "<h3>Завдання 5.2</h3>";
   $a = 4;
   generateAndGetMin($a);
   echo "</div>";
   ?>
   <div class="next_task">
      <div>
         <a href="lab3.4.php">
            << Завдання 4 |</a>
               <a href="task6.php">| Завдання 6 >></a>
      </div>
      <a href="/index.php">Головна</a>
   </div>
</div>

</html>