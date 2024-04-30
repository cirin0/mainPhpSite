<?php
session_start();
if (!($_SESSION['login'] == 'pit' && $_SESSION['passwd'] == '123' || $_SESSION['password']))
   Header("Location: authorize.php");
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Секретна інформація</h2>
<?php
print_r($_SESSION);
echo "<br>";
if (isset($_SESSION['login'])) {
   echo "<br><p>Ви увійшли як користувач {$_SESSION['login']}</p>";
} else {
   echo "<br><p>Ви увійшли як гість</p>";
   echo '<a href="authorize.php">Авторизуйтесь</a>';
}
echo '<br><a href="secret_other.php">Перейти на іншу секретну сторінку</a>';
echo "<br>Cекретна інформація";
?>
<div class="next_task">
   <div>
      <a href="lab10.php">| Завдання 1>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>