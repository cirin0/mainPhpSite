<?php
session_start();
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
   unset($_SESSION['user_category']);
   unset($_SESSION['cart']);
   session_destroy();
   header('Location: index.php');
   exit();
} else {
   $_SESSION['message']['error'] = "Щоб вийти, спочатку увійдіть";
   header('Location: index.php');
}
