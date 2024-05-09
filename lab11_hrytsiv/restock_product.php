<?php
session_start();
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
$db_server->set_charset("utf8");
?>
<?php
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$sqlUpdateQuantity = "UPDATE hrytsiv_storage SET quantity = quantity + $quantity WHERE id = $productId";
mysqli_query($db_server, $sqlUpdateQuantity);
$sqlInsertOne = "SELECT name FROM hrytsiv_storage WHERE id = $productId";
$resultOne = mysqli_query($db_server, $sqlInsertOne);
$row = mysqli_fetch_assoc($resultOne);
$productName = $row['name'];
$_SESSION['message']['success'] = "Успішно поповнено товар: $productName на $quantity одиниць";
header('Location: product.php?id=' . $productId);
