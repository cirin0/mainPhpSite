<?php
session_start();

$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Сторінка авторизації</h2>
<?php
// if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
//    header("Location: secret_info.php");
//    exit();
// }
print_r($_SESSION);
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['login']) && isset($_GET['password'])) {
   $login = $_GET['login'];
   $password = $_GET['password'];
   $sql = "SELECT * FROM user_for_session WHERE login = '$login' AND password = '$password'";
   $result = mysqli_query($db_server, $sql);
   if ($result->num_rows == 1) {
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $password;
      header("Location: secret_info.php");
      exit();
   } else {
      echo "Невірний логін або пароль";
   }
}
?>
<div class="form_container">
   <form method="get">
      Login: <input type='text' name='login'>
      Password: <input type='password' name='password'>
      <input type='submit' name='go' value='Go'>
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab10.5.php">
         << Завдання 5 |</a>
            <a href="lab10.php">| Завдання 1 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>