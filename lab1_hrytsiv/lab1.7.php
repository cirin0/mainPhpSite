<?php
require '../config.php';
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <title>Завдання 1.7</title>
</head>

<body>
   <div class="wrapper">
      <div class="form_container">
         <h3>Введіть значення температур:</h3>
         <form method="post" action="">
            <label for="temp1">Температура 1:</label>
            <input type="text" name="temp1" id="temp1">
            <label for="temp2">Температура 2:</label>
            <input type="text" name="temp2" id="temp2">
            <label for="temp3">Температура 3:</label>
            <input type="text" name="temp3" id="temp3">
            <p>Виберіть завдання:</p><br>
            <select name="task">
               <option value="1">Обчислення максимальної температури</option>
               <option value="2">Обчислення мінімальної температури</option>
               <option value="3">Обчислення середньої температури</option>
            </select><br>
            <input type="submit" name="submit" value="Обчислити">
         </form>
      </div>
      <?php
      echo '<div class="form_center">';
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $temp1 = $_POST["temp1"];
         $temp2 = $_POST["temp2"];
         $temp3 = $_POST["temp3"];
         $task = $_POST["task"];
         if (!empty(is_numeric($temp1)) && !empty(is_numeric($temp2)) && !empty(is_numeric($temp3))) {
            $temp1 = intval($temp1);
            $temp2 = intval($temp2);
            $temp3 = intval($temp3);
            switch ($task) {
               case 1:
                  $result = max($temp1, $temp2, $temp3);
                  echo "Максимальна температура: $result";
                  break;
               case 2:
                  $result = min($temp1, $temp2, $temp3);
                  echo "Мінімальна температура: $result";
                  break;
               case 3:
                  $result = ($temp1 + $temp2 + $temp3) / 3;
                  echo "Середня температура: $result";
                  break;
               default:
                  echo "Невірно введений номер завдання";
                  echo '</div>';
            }
         } else {
            echo "Будь ласка, заповніть всі поля коректно";
         }
      }
      ?>
      <h3 class='back'><a href='lab1.php'>Назад</a></h3>
      <div class="next_task"><a href="/index.php">Головна</a></div>
   </div>
</body>

</html>