<?php
session_start();
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 2</h2>
<?php
if (!isset($_SESSION['login'])) {
   header("Location: authorize.php");
   exit();
}
if (isset($_POST['go_to_secret_info'])) {
   header("Location: secret_info.php");
   exit();
}
if (isset($_POST['logout'])) {
   session_unset();
   session_destroy();
   header("Location: lab10.php");
   exit();
}
if (isset($_SESSION['login'])) {
   echo "<p>Ви увійшли як користувач {$_SESSION['login']}</p>";
} else {
   echo "<p>Ви увійшли як гість</p>";
   echo '<a href="authorize.php">Авторизуйтесь</a>';
}
echo "<br>Cекретна інформація на сторінці secret_other.php";
?>
<div class="form_container">
   <form action="secret_other.php" method="POST">
      <input type="submit" name="go_to_secret_info" value="Перейти на іншу секретну сторінку">
   </form>
   <br>
   <form action="secret_other.php" method="POST">
      <input type="submit" name="logout" value="Вийти">
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab10.php">
         << Завдання 1 |</a>
            <a href="lab10.3.php">| Завдання 3 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>