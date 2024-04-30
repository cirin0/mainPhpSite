<?php
session_start();
if (isset($_SESSION['login'])) {
   header("Location: secret_info.php");
}
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Сторінка авторизації</h2>
<p>Логін: pit<br>Пароль: 123</p><br>
<?php
print_r($_SESSION);
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['go'])) {
   $_SESSION['login'] = $_GET['login'];
   $_SESSION['passwd'] = $_GET['passwd'];
   if ($_GET['login'] == "pit" && $_GET['passwd'] == "123") {
      header("Location: secret_info.php");
   } else {
      echo "Неправильне введення, спробуйте ще раз! <br>";
      echo "<br>";
      print_r($_SESSION);
   }
}
?>
<div class="form_container">
   <form method="get">
      Login: <input type='text' name='login'>
      Password: <input type='password' name='passwd'>
      <input type='submit' name='go' value='Go'>
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab10.php">
         << Назад |</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>