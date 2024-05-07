<?php
session_start();
$title = "Кошик";
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
if (!isset($_SESSION['login'])) {
   header('Location: login.php');
}
?>
<div class="main">
   <h2>Кошик</h2>
   <?php
   if (isset($_SESSION['success_message'])) {
      echo "<div class='info'>";
      echo "<p class='success'>" . $_SESSION['success_message'] . "</p>";
      unset($_SESSION['success_message']);
      echo "</div>";
   }
   ?>
   <div>
      <?php
      if ($_SESSION['user_category'] === 'Buyer') {
         echo "<p class='logged'>Ви увійшли як покупець під іменем {$_SESSION['login']}</p>";
      }
      ?>
   </div>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>