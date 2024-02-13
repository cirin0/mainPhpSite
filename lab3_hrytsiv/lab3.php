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
<html>
<H2>PHP. Робота з масивами</H2>
<?php
$my_array = array('Рядок 1', 'Рядок 2', 'Рядок 3');
create_table2($my_array, 3, 8, 8);
?>

<a href="example2.php">Приклад 2. Пошук мін/мах значення архіву </a><br>
<h3 class='back'><a href="../index.php">Повернутися в головне меню</a><br></h3>
</div>

</html>