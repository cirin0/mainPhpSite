<?php
session_start();
$title = "Магазин домашніх тварин";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
?>
<?php
if (isset($_SESSION['login'])) {
   unset($_SESSION['login']);
   header('Location: index.php');
} else {
   header('Location: index.php');
}
?>
<?php
require '../components/footer.php';
?>