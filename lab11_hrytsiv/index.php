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
// include_once './db/db copy.php';
// include_once './db/db.php';
$db_server->set_charset("utf8");
?>
<?php
$sqlInsertData = "INSERT INTO hrytsiv_storage (name, image, price, quantity) VALUES 
('Капібара', 'capypara.jpg', 10.50, 100),
('Шиншила', 'сhinchilla.jpg', 15.75, 50),
('Гекон', 'gecko.jpg', 8.25, 80),
('Кролик', 'rabbit.jpg', 12.00, 120),
('Тхір', 'ferret.jpg', 20.00, 30),
('Цуцення', 'puppy.jpg', 25.00, 40),
('Кішка', 'cat.jpg', 22.50, 60),
('Папуга', 'parrot.jpg', 17.00, 70)";

// if ($db_server->query($sqlInsertData) === TRUE) {
//    echo "Нові дані успішно додані до таблиці";
// } else {
//    echo "Помилка: " . $sqlInsertData . "<br>" . $db_server->error;
// }
?>
<?php
include_once 'action.php';
include_once 'helperFunc.php';
?>
<div class="main">
   <h1>Інтернет-магазин домашніх тварин</h1>
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
      // print_r($_SESSION);
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