<?php
session_start();
$productId = $_POST['productId'];
if (isset($_SESSION['cart'][$productId])) {
   unset($_SESSION['cart'][$productId]);
}
header('Location: cart.php');
