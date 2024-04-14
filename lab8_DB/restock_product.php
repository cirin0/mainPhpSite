<?php
$title = "Лабораторна робота №8";
require '../components/header.php';
include_once '../db.php';
// include_once '../db copy.php';
?>
<h2>Поповнення складу</h2>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId']) && isset($_POST['restock'])) {
   $productId = $_POST['productId'];
   $restock = $_POST['restock'];
   $sqlSelectData = "SELECT name FROM warehouse WHERE id = $productId";
   $result = $db_server->query($sqlSelectData);
   $product = $result->fetch_assoc();
   $productName = $product['name'];

   $sqlUpdateQuantity = "UPDATE warehouse SET quantity = quantity + $restock WHERE id = $productId";

   echo "<div class='purchased'>";
   if ($db_server->query($sqlUpdateQuantity) === TRUE) {
      echo "Склад поповнено на $restock одиниць $productName";
   } else {
      echo "Помилка при поповненні складу: " . $db_server->error;
   }
   echo "</div>";
} else {
   echo "Невірний запит на поповнення складу";
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