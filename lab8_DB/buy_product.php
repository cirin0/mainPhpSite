<?php
$title = "Лабораторна робота №8";
require '../components/header.php';
include_once '../db.php';
// include_once '../db copy.php';
?>
<h2>Корзина</h2>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId']) && isset($_POST['quantity'])) {
   $productId = $_POST['productId'];
   $quantity = $_POST['quantity'];
   $sqlSelectData = "SELECT name FROM warehouse WHERE id = $productId";
   $result = $db_server->query($sqlSelectData);
   $product = $result->fetch_assoc();
   $productName = $product['name'];

   $sqlUpdateQuantity = "UPDATE warehouse SET quantity = quantity - $quantity WHERE id = $productId";
   echo "<div class='purchased'>";
   if ($db_server->query($sqlUpdateQuantity) === TRUE) {
      echo "Куплено $quantity одиниць $productName";
   } else {
      echo "Помилка при купівлі товару: " . $db_server->error;
   }
   echo "</div>";
} else {
   echo "Невірний запит на купівлю товару";
}
?>
<div class="next_task">
   <div>
      <a href="lab8.5.php">Повертутись до списку</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>