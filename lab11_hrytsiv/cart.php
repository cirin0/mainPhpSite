<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('Location: login.php');
}
$title = "Кошик";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<div class="main">
   <h2>Кошик</h2>
   <?php
   include_once './comp/loged.php';
   if (!isset($_SESSION['cart'])) {
      echo "<h3>Кошик порожній</h3>";
      echo '<a class="back_to_product" href="index.php">Переглянути товари</a>';
   } else {
      echo '<div style="margin: 15px 0px;">
               <a class="back_to_product" href="index.php">Повернутися до товарів</a>
            </div>';
   }
   ?>
   <?php
   $totalCost = 0;
   echo "<div class='product'>";
   foreach ($_SESSION['cart'] as $productId => $quantity) {
      $sqlSelectOne = "SELECT * FROM hrytsiv_storage WHERE id = $productId";
      $resultOne = mysqli_query($db_server, $sqlSelectOne);
      if ($resultOne && mysqli_num_rows($resultOne) > 0) {
         $row = mysqli_fetch_assoc($resultOne);
         $totalItemCost = $row['price'] * $quantity;
         $totalCost += $totalItemCost;
         $newQuantity = $row['quantity'] - $quantity;
         $sqlUpdateQuantity = "UPDATE hrytsiv_storage SET quantity = $newQuantity WHERE id = $productId";
         mysqli_query($db_server, $sqlUpdateQuantity);
         echo "<div class='product_items product_items_row'>";
         echo "<img class='item_image_cart' src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
         echo "<div>";
         echo "<p class='item_name'>" . $row['name'] . "</p>";
         echo "<p class='item_price'>Ціна: " . $row['price'] . " грн.</p>";
         echo "<p class='item_quantity'>Кількість: " . $quantity . "</p>";
         echo "<p class='item_total'>Загальна вартість: " . $row['price'] * $quantity . " грн.</p>";
         echo "<br>";
         echo "<form action='remove_from_cart.php' method='POST'>";
         echo "<input type='hidden' name='productId' value='" . $row['id'] . "'>";
         echo "<button type='submit' name='remove_from_cart'>Видалити з кошика</button>";
         echo "</form>";
         echo "</div>";
         echo "</div>";
      }
   }
   echo "</div>";
   if (isset($_SESSION['cart'])) {
      echo "<p class='summary'>Загальна вартість у кошику: $totalCost грн.</p>";
      echo "<br>";
      echo "<form action='clear_cart.php' method='POST'>";
      echo "<button type='submit' name='clear_cart'>Очистити кошик</button>";
      echo "</form>";
   }
   ?>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>