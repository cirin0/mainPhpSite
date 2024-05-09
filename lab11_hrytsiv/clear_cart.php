<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear_cart'])) {
   unset($_SESSION['cart']);
   header('Location: cart.php');
}
