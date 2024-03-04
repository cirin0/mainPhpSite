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

<body>
   <div class="wrapper">
      <?php
      for ($i = 0; $i < 10; $i++) {
         $array[$i] = mt_rand(1, $i + 10);
         echo "<div> A[" . $i . "] =" . $array[$i] . "</div><br>";
      }
      $min = $array[0];
      $max = $array[0];
      for ($i = 0; $i < 10; $i++) {
         if ($array[$i] > $max) {
            $max = $array[$i];
            $indexMax = $i;
         }
         if ($array[$i] < $min) {
            $min = $array[$i];
            $indexMin = $i;
         }
      }
      echo "<div>Мінімум: індекс - " . $indexMin . ", значення - " . $min . "</div><br>";
      echo "<div>Максимум: індекс - " . $indexMax . ", значення - " . $max . "</div><br>";
      ?>
      <div class="next_task">
         <div>
            <a href="lab3.php">
               << Завдання 1 |</a>
                  <a href="lab3.3.php">| Завдання 3 >></a>
         </div>
         <a href="/index.php">Головна</a>
      </div>
   </div>
</body>

</html>