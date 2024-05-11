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
   header('Location: index.php');
}
