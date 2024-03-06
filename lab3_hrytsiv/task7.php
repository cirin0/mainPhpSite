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
      $randomNum = mt_rand(1, 6);
      echo "<a href='task7.php?num={$randomNum}'>Task7</a>";
      echo "$randomNum<br>";
      switch ($randomNum) {
         case 1:
            echo "Викликати функцію func1";
            break;
         case 2:
            echo "Викликати функцію func2";
            break;
         case 3:
            echo "Викликати функцію func3";
            break;
         default:
            echo "Некоректні дані";
            break;
      }
      ?>
</body>

</html>