<?php
session_start();
$title = "Магазин домашніх тварин";
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
include_once 'helper_function.php';
?>
<div class="main">
   <h1>Інтернет-магазин домашніх тварин</h1>
   <?php
   // print_r($_SESSION);
   if (isset($_SESSION['message'])) {
      echo "<div class='info'>";
      if ($_SESSION['message']['error']) {
         echo "<p class='error_message'>" . $_SESSION['message']['error'] . "</p>";
      } else {
         echo "<p class='success_message'>" . $_SESSION['message']['success'] . "</p>";
      }
      unset($_SESSION['message']);
      echo "</div>";
   }
   ?>
   <div>
      <?php
      if (!isset($_SESSION['login'])) {
         echo "<h2>Ви увійшли як гість</h2>";
         PrintUnLogData($db_server);
      }
      ?>
      <?php
      if ($_SESSION['user_category'] === 'Seller') {
         echo "<div class='logged_main'>";
         echo "<p class='logged'>Ви увійшли як продавець під іменем {$_SESSION['login']}</p>";
         echo "</div>";
         PrintProductCard($db_server);
      } elseif ($_SESSION['user_category'] === 'Buyer') {
         echo "<div class='logged_main'>";
         echo "<p class='logged'>Ви увійшли як покупець під іменем {$_SESSION['login']}</p>";
         echo "</div>";
         PrintProductCard($db_server);
      }
      ?>
   </div>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>