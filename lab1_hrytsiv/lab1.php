<?php
require '../config.php';
if (!empty($_GET["zm"])) {
   echo "Значення переданої змінної zm=" . $_GET["zm"];
} else {
   echo "zminna zm not fount";
}
$zm = $_GET["zm"];
if (!empty($_GET["ULogin"])) {
   echo "<br>Значення переданої змінної ULogin " . $_GET["ULogin"];
} else {
   echo "<br>zminna ULogin not fount";
}
$ULogin = $_GET["ULogin"];
?>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <style>
      .wrapper {
         display: flex;
         flex-direction: column;
         gap: 20px;
      }

      a:hover {
         scale: 1.1;
      }
   </style>
</head>
<title>PHP</title>

<body>
   <div class="wrapper">
      <h3>Приклади з теорії</h3>
      <a href="example1_1_5_1.php">Доступ до змінних форми post (приклад 1.1.5.1)</a>
      <a href="example1_1_5_2.php">Доступ до змінних форми get (приклад 1.1.5.2)</a>
      <a href="operator_if.php">if, eseif, else (приклади з 1.1.15,1.1.16,1.1.17, 1.1.18 )</a>
      <a href="operator_switch.php">switch (приклад 1.1.19)</a>
      <a href="loops.php">while, do-while (приклад 1.1.20, 1.1.21, 1.1.22)</a>
      <a href="lab1.7.php">Завдання 1.7</a>
      <h3><a href="/index.php">Повернутися в меню</a></h3>
   </div>
   </div>
</body>

</html>