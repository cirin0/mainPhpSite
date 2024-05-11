<?php
session_start();
$productId = $_POST['productId'];
if (isset($_SESSION['cart'][$productId])) {
   unset($_SESSION['cart'][$productId]);
   $_SESSION['message']['success'] = "Товар видалено з кошика";
   header('Location: cart.php');
}
