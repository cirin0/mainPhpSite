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
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<div class="main">
   <h1>Інтернет-магазин домашніх тварин</h1>
   <?php
   printMessage();
   ?>
   <div>
      <?php
      if (!isset($_SESSION['login'])) {
         echo "<h2>Ви увійшли як гість</h2>";
         PrintUnLogData();
      }
      ?>
      <?php
      if ($_SESSION['user_category'] === 'Seller') {
         echo "<div class='logged_main'>";
         echo "<p class='logged'>Ви увійшли як продавець під іменем {$_SESSION['login']}</p>";
         echo "</div>";
         PrintProductCard();
      } elseif ($_SESSION['user_category'] === 'Buyer') {
         echo "<div class='logged_main'>";
         echo "<p class='logged'>Ви увійшли як покупець під іменем {$_SESSION['login']}</p>";
         echo "</div>";
         PrintProductCard();
      }
      ?>
   </div>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>