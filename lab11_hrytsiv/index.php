<?php
session_start();
$title = "Магазин домашніх тварин";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
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
   if (isset($_SESSION['login'])) {
      echo "<h2>Ви увійшли як {$_SESSION['login']}</h2>";
   } else {
      PrintUnLogData($db_server);
   }
   ?>
</div>
<?php
require '../components/footer.php';
?>