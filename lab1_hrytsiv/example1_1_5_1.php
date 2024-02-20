<?php
require '../config.php';
?>
<html>

<head>
   <title>Приклад форми Post</title>
</head>

<body>
   <?php
   $variable = $_POST['formvariable'];
   echo "variablePOST=$variable";
   echo "<br>";
   echo "<div><b>Число додане до поточного файлу методом post:" . $variable . "</b></div>";
   echo "<div>
   <form action='example1_1_5_1.php' method='post'>
   <input type='text' name='formvariable'>
   <input type='submit' value='Додати число до поточного файлу'><br></form>

   <form action='example1_1_5_2.php' method='get'>
   <input type='text' name='formvariableGet'>
   <input type='submit' value='Додати число до файлу example1_1_5_2.php'></form></div>";
   echo "<div>
         <form action='example1_1_5_2.php' method='get'>
            <input type='text' name='formvariableGet'>
            <input type='submit' value='Додати число до поточного файлу (GET)'><br>
         </form>
      </div>";
   ?>
   <h3 class='back'><a href='lab1.php'>Назад</a></h3>
</body>

</html>