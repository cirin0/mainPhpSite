<?php
session_start();
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 1</h2>
<?php
if (isset($_SESSION['login'])) {
   echo "<p>Ви увійшли як користувач {$_SESSION['login']}</p>";
} else {
   echo "<p>Ви увійшли як гість</p>";
   echo '<a href="lab10.6.php">Авторизуйтесь</a>';
}
echo "<br>";
unset($_SESSION['passwd']);
unset($_SESSION['login']);
echo session_id();
echo "<br>";
echo session_name();
echo '<div style="font-size: 25px;">';
echo '<a href="secret_info.php">Секретна сторінка</a> <br>';
echo '<a href="lab10.5.php">Форма реєстрація</a>';
echo "</div>";
?>
<h2>Приклад знищення сесій</h2>
<?php
$test = "Змінна сесії";
$_SESSION['test'] = $test;
print_r($_SESSION);
echo "<br>";
echo session_id();
echo "<br>";
session_unset();
print_r($_SESSION);
echo "<br>";
echo session_id();
echo "<br>";
session_destroy();
print_r($_SESSION);
echo session_id();
?>
<h2>Приклад Кукі</h2>
<?php
if (isset($_COOKIE['Mortal'])) {
   $cnt = $_COOKIE['Mortal'] + 1;
} else {
   $cnt = 0;
}
setcookie("Mortal", $cnt, 0x6FFFFFFF);
echo "<p>Ви відвідували цю сторінку <b>" . @$_COOKIE['Mortal'] . "</b> раз</p>";
?>
<h2>Налаштування та читання масивів файлів cookie</h2>
<?php
setcookie("cookie[1]", "Перший");
setcookie("cookie[2]", "Другий");
setcookie("cookie[3]", "Третій");

if (isset($_COOKIE['cookie'])) {
   foreach ($_COOKIE['cookie'] as $name => $value) {
      echo "$name: $value <br>";
   }
}

?>
<div class="next_task">
   <div>
      <a href="secret_other.php">| Завдання 2>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>