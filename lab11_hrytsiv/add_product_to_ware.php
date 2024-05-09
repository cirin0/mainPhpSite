<?php
session_start();
if ($_SESSION['user_category'] !== 'Seller') {
   header('Location: index.php');
   exit();
}
$title = "Додати товар";
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
include_once 'action.php';
include_once 'helper_function.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = mysqli_real_escape_string($db_server, trim($_POST['name']));
   $price = trim($_POST['price']);
   $quantity = trim($_POST['quantity']);
   $image = $_FILES['image'];
   $allowedExtensions = ['jpg', 'jpeg', 'png'];
   $maxFileSize = 1000000;

   if (in_array(pathinfo($image['name'], PATHINFO_EXTENSION), $allowedExtensions)) {
      if ($image['error'] === 0 && $image['size'] < $maxFileSize) {
         $imageName = $image['name'];
         echo "name: $name";
         echo " price: $price";
         echo " quantity: $quantity";
         echo " imageName: $imageName";
         $imageDestination = './images/' . $imageName;
         $sqlInsertProduct = "INSERT INTO hrytsiv_storage (name, image, price, quantity) VALUES ('$name', '$imageName', '$price', '$quantity')";
         mysqli_query($db_server, $sqlInsertProduct);
         move_uploaded_file($image['tmp_name'], $imageDestination);
         $_SESSION['message']['success'] = "Товар успішно додано";
         header('Location: index.php');
         exit();
      } else {
         $error =  "<p class='error_message'>Помилка завантаження файлу або файл завеликий</p>";
      }
   } else {
      $error = "<p class='error_message'>Неправильний формат файлу</p>";
   }
}
?>
<div class="main" style="align-items: center;">
   <h2>Додати новий товар</h2>
   <?php
   include_once './comp/loged.php';
   echo $error;
   ?>
   <div class="form_container">
      <form method="post" enctype="multipart/form-data">
         <input type="text" name="name" id="name" placeholder="Введіть назву товару" require>
         <input type="number" name="price" id="price" placeholder="Введіть ціну товару" require>
         <input type="number" name="quantity" id="quantity" placeholder="Введіть кількість товару" require>
         <input type="file" name="image" id="file-upload" require>
         <button type="submit" name="add_product">Додати товар</button>
      </form>
   </div>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>