<?php
include '../config.php';
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <style>
      .container {
         display: flex;
         flex-direction: column;
         align-items: center;
      }

      .block {
         border: 1px solid;
         display: flex;
         flex-direction: column;
         margin-bottom: 10px;
         border-radius: 10px;
         padding: 10px;
      }

      .wrapper {
         margin-top: 20px;
      }
   </style>
   <title>Цикли do, do-while, for</title>

</head>

<body>
   <div class="wrapper">
      <div class="container">
         <div class="block">
            <h2>Виведення таблиці множення на 5 за допомогою циклу while</h2>
            <?php
            $num = 1;
            echo "<h3>Таблиця множення для числа 5:</h3>";
            while ($num <= 10) {
               $result = $num * 5;
               echo "5 * $num = $result <br>";
               $num++;
            }
            ?>
         </div>
         <div class="block">
            <h2>Виведення суми чисел від 1 до 20 за допомогою циклу do-while</h2>
            <?php
            $num = 1;
            $sum = 0;
            echo "<h3>Сума чисел від 1 до 20:</h3>";
            do {
               $sum += $num;
               $num++;
            } while ($num <= 20);
            echo "Сума: $sum";
            ?>
         </div>
         <div class="block">
            <h2>Виведення парних чисел від 2 до 10 за допомогою циклу for</h2>
            <?php
            echo "<p>Парні числа від 2 до 20:</p>";
            for ($num = 2; $num <= 20; $num += 2) {
               echo $num . " ";
            }
            ?>
         </div>
      </div>
      <h3 class='back'><a href='lab1.php'>Назад</a></h3>
      <div class="next_task"><a href="/index.php">Головна</a></div>
   </div>
</body>

</html>