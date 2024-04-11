<?php
// Підключення до бази даних (код підключення до бази даних в `product_details.php` має бути такий же як і в основному файлі)

if (isset($_GET['id'])) {
   $product_id = $_GET['id'];
   $sql_select_product = "SELECT * FROM warehouse WHERE id = $product_id";
   $result_product = $conn->query($sql_select_product);

   if ($result_product->num_rows > 0) {
      $row_product = $result_product->fetch_assoc();
      echo "<h2>Детальна інформація про товар: " . $row_product['name'] . "</h2>";
      echo "<img src='" . $row_product['image'] . "' alt='" . $row_product['name'] . "' width='200'><br>";
      echo "<p>Ціна за одиницю товару: $" . $row_product['price'] . "</p>";
      echo "<p>Наявна кількість: " . $row_product['quantity'] . "</p>";
      echo "<form action='buy_product.php' method='POST'>";
      echo "<input type='hidden' name='product_id' value='" . $row_product['id'] . "'>";
      echo "<label for='quantity'>Кількість:</label>";
      echo "<input type='number' id='quantity' name='quantity' min='1' max='" . $row_product['quantity'] . "' value='1'>";
      echo "<input type='submit' value='Купити'>";
      echo "</form>";
   } else {
      echo "Товар не знайдено";
   }
} else {
   echo "Немає інформації про товар";
}
