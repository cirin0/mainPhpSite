<?php
function PrintUnLogData($db_server): void
{
   echo "<div class='product'>";
   $query = "SELECT * FROM hrytsiv_storage ORDER BY RAND() LIMIT 4";
   $result = mysqli_query($db_server, $query);
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<a href='product.php?id={$row['id']}' class='link_item'>";
         echo "<div class='product_items'>";
         echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
         echo "<p class = 'product_name'>{$row['name']}</p>";
         echo "<p class = 'product_price'>Ціна: {$row['price']} грн.</p>";
         echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
         echo "</div>";
         echo "</a>";
      }
   } else {
      echo "<p>В даний момент товари недоступні.</p>";
   }
   mysqli_close($db_server);
   echo "</div>";
}
function PrintProductCard($db_server): void
{
   echo "<div class='product'>";
   $query = "SELECT * FROM hrytsiv_storage";
   $result = mysqli_query($db_server, $query);
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<a href='product.php?id={$row['id']}' class='link_item'>";
         echo "<div class='product_items'>";
         echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
         echo "<p class = 'product_name'>{$row['name']}</p>";
         echo "<p class = 'product_price'>Ціна: {$row['price']} грн.</p>";
         echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
         echo "<p class = 'product_dateAdd'>Дата додавання: {$row['date_added']}</p>";
         echo "</div>";
         echo "</a>";
      }
   } else {
      echo "<p>В даний момент товари недоступні.</p>";
   }
   mysqli_close($db_server);
   echo "</div>";
}
function isValidName($name)
{
   return preg_match('/^[A-Z][a-z]+$/', $name);
}

function isValidEmail($email)
{
   return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@pnu\.edu\.ua$/', $email);
}

function isValidPassword($password)
{
   return strlen($password) >= 6 && preg_match('/[a-zA-Z]/', $password) && preg_match('/\d/', $password) && preg_match('/[_\-.@#$%^&!?\*]/', $password);
}
