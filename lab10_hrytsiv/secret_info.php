<?php
session_start();
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Секретна інформація</h2>
<?php
if (!($_SESSION['login'] == 'pit' && $_SESSION['passwd'] == 123))
   Header("Location: authorize.php");
print_r($_SESSION);
echo "<br>";
if (isset($_SESSION['login'])) {
   echo "<br><p>Ви увійшли як користувач {$_SESSION['login']}</p>";
   echo '<a href="secret_other.php">Перейти на іншу секретну сторінку</a>';
} else {
   echo "<br><p>Ви увійшли як гість</p>";
   echo '<a href="authorize.php">Авторизуйтесь</a>';
}
echo "<br>";
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