<?php
session_start();
if (isset($_POST['clear_cart'])) {
   unset($_SESSION['cart']);
   $_SESSION['message']['success'] = "Кошик очищено";
   header('Location: cart.php');
   exit();
}
