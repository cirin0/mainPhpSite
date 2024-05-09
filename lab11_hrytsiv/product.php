<?php
session_start();
if (!isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Увійдіть для перегляду товару";
   header('Location: login.php');
   exit();
}
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
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<?php
include_once './comp/loged.php';
?>
<div class="main">
   <?php
   if (isset($_SESSION['message'])) {
      echo "<div class='info'>";
      if ($_SESSION['message']['error']) {
         echo "<p class='error_message'>" . $_SESSION['message']['error'] . "</p>";
      } else {
         echo "<p class='success_message'>" . $_SESSION['message']['success'] . "</p>";
      }
      unset($_SESSION['message']);
      echo "</div>";
   }
   ?>
   <?php
   if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $productId = $_GET['id'];
      $sqlSelectOne = "SELECT * FROM hrytsiv_storage WHERE id = $productId";
      $resultOne = mysqli_query($db_server, $sqlSelectOne);
      if (mysqli_num_rows($resultOne) > 0) {
         while ($row = mysqli_fetch_assoc($resultOne)) {
            echo "<div class='product_details'>";
            $id = $row['id'];
            $quantity = $row['quantity'];
            echo "<h2>Детальна інформація про товар: " . $row['name'] . "</h2>";
            echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
            echo "<p class = 'product_price'>Ціна: {$row['price']} грн.</p>";
            echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
            echo "</div>";
         }
         if ($_SESSION['user_category'] === 'Buyer') {
            echo "<div class='form_container form_products'>";
            echo "<form action='add_product_to_card.php' method='POST'>";
            echo "<input type='hidden' name='productId' value='" . $id . "'>";
            echo "<label for='quantity'>Кількість:</label>";
            echo "<input type='number' id='quantity' name='quantity' min='1' max='" . $quantity . "' value='1'>";
            echo "<input type='submit' name='add_to_cart' value='Додати в кошик'>";
            echo "</form>";
            echo "</div>";
         }
         if ($_SESSION['user_category'] === 'Seller') {
            echo "<div class='form_container form_products'>";
            echo "<form action='restock_product.php' method='POST'>";
            echo "<input type='hidden' name='productId' value='" . $id . "'>";
            echo "<label for='restock'>Поповнити склад:</label>";
            echo "<input type='number' id='restock' name='quantity' min='1' value='1'>";
            echo "<input type='submit' value='Поповнити'>";
            echo "</form>";
            echo "</div>";
         }
      } else {
         echo "Товар не знайдено";
      }
   }
   mysqli_close($db_server);
   ?>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>