<?php
$title = "Лабораторна робота №8";
require '../components/header.php';
include_once '../db.php';
// include_once '../db copy.php';
?>
<!-- <h2>Завдання </h2> -->
<?php

if (isset($_GET['id'])) {
   $productId = $_GET['id'];
   $sqlSelectProduct = "SELECT * FROM warehouse WHERE id = $productId";
   $resultProduct = $db_server->query($sqlSelectProduct);

   if ($resultProduct->num_rows > 0) {
      $rowProduct = $resultProduct->fetch_assoc();
      echo "<h2>Детальна інформація про товар: " . $rowProduct['name'] . "</h2>";
      echo "<img src='" . $rowProduct['image'] . "' alt='" . $rowProduct['name'] . "' width='250px'><br>";
      echo "<p>Ціна за одиницю товару: ₴ " . $rowProduct['price'] . "</p>";
      echo "<p>Наявна кількість: " . $rowProduct['quantity'] . "</p>";

      echo "<div class='form_container form_products'>";

      echo "<form action='buy_product.php' method='POST'>";
      echo "<input type='hidden' name='productId' value='" . $rowProduct['id'] . "'>";
      echo "<label for='quantity'>Кількість:</label>";
      echo "<input type='number' id='quantity' name='quantity' min='1' max='" . $rowProduct['quantity'] . "' value='1'>";
      echo "<input type='submit' value='Купити'>";
      echo "</form>";

      echo "<form action='restock_product.php' method='POST'>";
      echo "<input type='hidden' name='productId' value='" . $rowProduct['id'] . "'>";
      echo "<label for='restock'>Поповнити склад:</label>";
      echo "<input type='number' id='restock' name='restock' min='1' value='1'>";
      echo "<input type='submit' value='Поповнити'>";
      echo "</form>";
      echo "</div>";
   } else {
      echo "Товар не знайдено";
   }
} else {
   echo "Немає інформації про товар";
}
?>
<div class="next_task">
   <div>
      <a href="lab8.5.php">Назад</a>
   </div>
</div>
<?php
require '../components/footer.php';
?>