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
?>
<h1>Інтернет-магазин домашніх тварин</h1>
<div>
   <section class="guest-info">
      <h2>Ви увійшли як гість</h2>
      <div class="info">
         <?php
         if (isset($_SESSION['success_message'])) {
            echo "<p class='success'>" . $_SESSION['success_message'] . "</p>";
            unset($_SESSION['success_message']);
         }
         ?>
      </div>
      <div class="product">
         <?php
         $query = "SELECT * FROM hrytsiv_storage ORDER BY RAND() LIMIT 4";
         $result = mysqli_query($db_server, $query);
         if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
               echo "<div class='product_items'>";
               echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
               echo "<p class = 'product_name'>{$row['name']}</p>";
               echo "<p class = 'product_price'>{$row['price']} грн.</p>";
               echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
               echo "<p class = 'product_dateAdd'>Дата додавання: {$row['date_added']}</p>";
               echo "</div>";
            }
         } else {
            echo "<p>В даний момент товари недоступні.</p>";
         }
         mysqli_close($db_server);
         ?>
      </div>
   </section>
</div>
<?php

?>
<?php
require '../components/footer.php';
?>