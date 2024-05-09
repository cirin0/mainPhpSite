<?php
session_start();
$localEnvironment = false;
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
$db_server->set_charset("utf8");
?>
<?php
if (isset($_POST['add_to_cart'])) {
   if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
   }

   $productId = $_POST['productId'];
   $quantity = $_POST['quantity'];
   $sqlSelectOne = "SELECT * FROM hrytsiv_storage WHERE id = $productId";
   $resultOne = mysqli_query($db_server, $sqlSelectOne);
   $row = mysqli_fetch_assoc($resultOne);
   $availableQuantity = $row['quantity'];
   if ($quantity > $availableQuantity) {
      $_SESSION['message']['error'] = "Вибачте, ви ввели більшу кількість товару, ніж доступно";
      header('Location: product.php?id=' . $productId);
      exit();
   }
   if (isset($_SESSION['cart'][$productId])) {
      $_SESSION['cart'][$productId] += $quantity;
   } else {
      $_SESSION['cart'][$productId] = $quantity;
   }
   header('Location: cart.php');
   exit();
}
