<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('Location: login.php');
   exit();
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
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<?php
if (!isset($_SESSION['cart'])) {
   $_SESSION['cart'] = [];
}
if (isset($_POST['add_to_cart'])) {
   $productId = $_POST['productId'];
   $quantity = $_POST['quantity'];
   if (array_key_exists($productId, $_SESSION['cart'])) {
      $_SESSION['cart'][$productId] += $quantity;
   } else {
      $_SESSION['cart'][$productId] = $quantity;
   }
   updateProductQuantity($productId, $quantity);
   $_SESSION['message']['success'] = "Товар успішно додано в кошик";
   header('Location: warehouse.php');
   exit();
}
?>
<div class="main">
   <h2>Кошик</h2>
   <?php
   include_once './comp/loged.php';
   printMessage();
   if (!empty($_SESSION['cart'])) {
      echo '<div style="margin: 15px 0px;">
               <a class="back_to_product" href="warehouse.php">Повернутися до товарів</a>
            </div>';
   }
   ?>
   <?php
   $totalCost = 0;
   echo "<div class='product'>";
   if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $productId => $quantity) {
         $sqlSelectOne = "SELECT * FROM hrytsiv_storage WHERE id = $productId";
         $resultOne = mysqli_query($db_server, $sqlSelectOne);

         if ($resultOne && mysqli_num_rows($resultOne) > 0) {
            $row = mysqli_fetch_assoc($resultOne);
            $currentQuantity = $row['quantity'];
            $totalItemCost = $row['price'] * $quantity;
            $totalCost += $totalItemCost;

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
   } else {
      echo "<h3>Кошик порожній</h3>";
      echo '<a class="back_to_product" href="warehouse.php">Переглянути товари</a>';
   }
   echo "</div>";
   if (isset($_SESSION['cart'][$productId])) {
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