<?php
// Підключення до бази даних (код підключення до бази даних в `buy_product.php` має бути такий же як і в основному файлі)

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
   $product_id = $_POST['product_id'];
   $quantity = $_POST['quantity'];

   $sql_update_quantity = "UPDATE warehouse SET quantity = quantity - $quantity WHERE id = $product_id";

   if ($conn->query($sql_update_quantity) === TRUE) {
      echo "Куплено $quantity одиниць товару!";
   } else {
      echo "Помилка при купівлі товару: " . $conn->error;
   }
} else {
   echo "Невірний запит на купівлю товару";
}
