<?php
$title = "Лабораторна робота №8";
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
?>
<!-- <h2>Завдання </h2> -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
   $product_id = $_POST['product_id'];
   $quantity = $_POST['quantity'];

   $sql_update_quantity = "UPDATE warehouse SET quantity = quantity - $quantity WHERE id = $product_id";

   if ($db_server->query($sql_update_quantity) === TRUE) {
      echo "Куплено $quantity одиниць товару!";
   } else {
      echo "Помилка при купівлі товару: " . $db_server->error;
   }
} else {
   echo "Невірний запит на купівлю товару";
}
?>
<div class="next_task">
   <div>
      <a href="lab8.5.php">lab 8|</a>
      <a href="product_details.php">| Назад</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>