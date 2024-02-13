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
<title>PHP</title>

<body>
   <h3>Приклади з теорії</h3>
   <a href="example1_1_5_1.php">Доступ до змінних форми post (приклад 1.1.5.1) </a><br>
   <a href="example1_1_5_2.php">Доступ до змінних форми get (приклад 1.1.5.2)</a><br>
   <a href="operator_if.php">if, eseif, else (приклади з 1.1.15,1.1.16,1.1.17, 1.1.18 )</a><br>
   <a href="operator_switch.php">switch (приклад 1.1.19)</a><br>

   <h3 class='back'><a href="../">Повернутися в меню</a><br></h3>
   </div>
</body>

</html>