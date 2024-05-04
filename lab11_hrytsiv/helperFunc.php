<?php
function PrintUnLogData($db_server): void
{
   echo "<h2>Ви увійшли як гість</h2>";
   echo "<div class='product'>";
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
   echo "</div>";
}
