<?php
session_start();
$title = "Склад";
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
if (!isset($_SESSION['login'])) {
   header('Location: login.php');
}

?>
<?php
require '../components/footer.php';
?>