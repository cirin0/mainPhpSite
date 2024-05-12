<?php
session_start();
if (!isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Увійдіть для перегляду Складу";
   header('Location: index.php');
   exit();
}
$title = "Склад";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
?>
<?php
include_once 'action.php';
include_once 'helper_function.php';
?>
<div class="main">
   <h2>Склад</h2>
   <?php
   include_once './comp/loged.php';
   printMessage();
   PrintProductCard();
   ?>
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>