<?php
session_start();
$title = "Магазин домашніх тварин";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<div class="main">
   <h1>Інтернет-магазин домашніх тварин</h1>
   <?php
   printMessage();
   ?>
   <?php
   if (!isset($_SESSION['login'])) {
      echo "<h2>Ви увійшли як гість</h2>";
      $query = "SELECT * FROM hrytsiv_storage ORDER BY RAND() LIMIT 4";
   } else {
      include __DIR__ . '/comp/loged.php';
      $query = "SELECT * FROM hrytsiv_storage ORDER BY RAND()";
   }
   echo "<section class='products'>";
   if (isset($_SESSION['login'])) {
      echo "<div class='sort'>";
      echo " <select name='select' id='sort' onchange='sortProducts()'>";
      echo "   <option selected disabled>Сортувати:</option>";
      echo "   <option value='name'>По алфавіту</option>";
      echo "   <option value='price'>По ціні</option>";
      echo "   <option value='date_added'>По даті</option>";
      echo "</select>";
      echo "</div>";
   }
   echo "<div class='product'>";
   $result = mysqli_query($db_server, $query);
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<a class='link_item' href='product.php?id={$row['id']}'>";
         echo "<div class='product_items'>";
         echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
         echo "<p class = 'product_name'>{$row['name']}</p>";
         echo "<p class = 'product_price'>Ціна: {$row['price']} грн.</p>";
         echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
         if (isset($_SESSION['login'])) {
            echo "<p class = 'product_dateAdd'>Дата додавання: {$row['date_added']}</p>";
         }
         echo "</div>";
         echo "</a>";
      }
   } else {
      echo "<p>В даний момент товари недоступні.</p>";
   }
   mysqli_close($db_server);
   echo "</div>";
   echo "</section>";
   ?>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>