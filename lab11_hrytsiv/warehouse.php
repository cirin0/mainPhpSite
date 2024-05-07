<?php
session_start();
if ($_SESSION['user_category'] !== 'Seller') {
   $_SESSION['success_message'] = "Увійдіть як продавець для перегляду Складу";
   header('Location: index.php');
   exit();
}
$title = "Склад";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
include_once 'helperFunc.php';
?>
<?php
?>
<div class="main">
   <h2>Склад</h2>
   <?php
   if (($_SESSION['login']) && $_SESSION['user_category'] === 'Seller') {
      echo "<div class='logged_main'>";
      echo "<p class='logged'>Ви увійшли як продавець під іменем {$_SESSION['login']}</p>";
      echo "</div>";
      PrintProductCard($db_server);
   }
   ?>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>