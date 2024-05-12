<?php
session_start();
if (!isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Увійдіть для видалення товару";
   header('Location: login.php');
   exit();
}
$title = "Видалення товару";
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
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
   $productId = $_POST['productId'];
   $sqlDelete = "DELETE FROM hrytsiv_storage WHERE id = $productId";
   mysqli_query($db_server, $sqlDelete);
   $_SESSION['message']['success'] = "Товар успішно видалено";
   header('Location: warehouse.php');
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
   $productId = $_GET['id'];
   $sqlSelectOne = "SELECT * FROM hrytsiv_storage WHERE id = $productId";
   $resultOne = mysqli_query($db_server, $sqlSelectOne);
   if (mysqli_num_rows($resultOne) > 0) {
      while ($row = mysqli_fetch_assoc($resultOne)) {
         echo "<div class='product_details'>";
         $id = $row['id'];
         echo "<h2>Товар: " . $row['name'] . "</h2>";
         echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
         echo "</div>";
      }
      echo "<div class='form_container form_products'>";
      echo "<form method='POST'>";
      echo "<input type='hidden' name='productId' value='" . $id . "'>";
      echo "<input type='submit' name='delete_product' value='Видалити товар'>";
      echo "</form>";
      echo "</div>";
   } else {
      $_SESSION['message']['error'] = "Товар не знайдено";
      header('Location: warehouse.php');
      exit();
   }
} else {
   $_SESSION['message']['error'] = "Товар не знайдено";
   header('Location: warehouse.php');
   exit();
}
?>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>

