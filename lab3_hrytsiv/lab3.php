<?php
require '../config.php';
include_once 'function.php';
if (!empty($_GET["zm"])) {
   echo "Значення переданої змінної zm=" . $_GET["zm"];
} else {
   echo "zminna zm not fount";
}
$zm = $_GET["zm"];
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
      <h2>PHP. Робота з масивами</h2>
      <?php
      $my_array = ['Рядок 1', 'Рядок 2', 'Рядок 3'];
      create_table2($my_array, 3, 8, 8);
      ?>
      <!-- <a href="example2.php">Приклад 2. Пошук мін/мах значення архіву </a> -->
      <!-- <h3 class='back'><a href="../index.php">Повернутися в головне меню</a><br></h3> -->
      <div class="next_task">
         <div>
            <a href="example2.php">Приклад 2. Пошук мін/мах значення архіву >></a>
         </div>
         <a href="/index.php">Головна</a>
      </div>
   </div>
</body>

</html>