<?php
session_start();
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
   unset($_SESSION['user_category']);
   header('Location: index.php');
} else {
   header('Location: index.php');
}
