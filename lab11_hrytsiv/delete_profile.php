<?php
session_start();
if (!isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Спочатку увійдіть в акаунт";
   header('Location: login.php');
   exit;
}
$title = "Видалення профілю";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $email = $_SESSION['email'];
   $sqlDelete = "DELETE FROM hrytsiv_users WHERE login = '$email'";
   $result = mysqli_query($db_server, $sqlDelete);
   if ($result) {
      $_SESSION['message']['success'] = "Ваш профіль успішно видалено";
      header('Location: logout.php');
      exit;
   } else {
      $_SESSION['message']['error'] = "Помилка видалення профілю";
   }
}
?>
<div class="main">
   <?php
   printMessage();
   ?>
   <h1>Видалення профілю</h1>
   <div class="form_container">
      <form method="post">
         <p>Ви впевнені, що хочете видалити свій профіль?</p>
         <br>
         <button type="submit">Так</button>
      </form>
   </div>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>