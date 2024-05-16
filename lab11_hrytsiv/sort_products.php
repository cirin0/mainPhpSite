<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('Location: index.php');
   exit();
}
$localEnvironment = false;
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
?>

<?php
$sortBy = $_POST['sortBy'];

if ($sortBy === 'name') {
   $query = "SELECT * FROM hrytsiv_storage ORDER BY name ASC";
} else {
   $query = "SELECT * FROM hrytsiv_storage ORDER BY $sortBy DESC";
}
$result = mysqli_query($db_server, $query);

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<a href='product.php?id={$row['id']}' class='link_item'>";
      echo "<div class='product_items'>";
      echo "<img src='images/{$row['image']}' alt='{$row['name']}'>";
      echo "<p class = 'product_name'>{$row['name']}</p>";
      echo "<p class = 'product_price'>Ціна: {$row['price']} грн.</p>";
      echo "<p class = 'product_quantity'>Кількість: {$row['quantity']}</p>";
      echo "<p class = 'product_dateAdd'>Дата додавання: {$row['date_added']}</p>";
      echo "</div>";
      echo "</a>";
   }
} else {
   echo "<p>В даний момент товари недоступні.</p>";
}
mysqli_close($db_server);
?>
