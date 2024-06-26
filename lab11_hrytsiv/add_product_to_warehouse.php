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
   $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
   $maxFileSize = 1000000;

   $sqlCheckProduct = "SELECT * FROM hrytsiv_storage WHERE name = '$name'";
   $result = mysqli_query($db_server, $sqlCheckProduct);
   if (mysqli_num_rows($result) > 0) {
      $message = "<p class='error_message'>Товар з такою назвою вже існує</p>";
   } else {
      if (in_array(pathinfo($image['name'], PATHINFO_EXTENSION), $allowedExtensions)) {
         if ($image['error'] === 0 && $image['size'] < $maxFileSize) {
            $imageName = $image['name'];
            $imageDestination = './images/' . $imageName;
            $sqlInsertProduct = "INSERT INTO hrytsiv_storage (name, image, price, quantity) VALUES ('$name', '$imageName', '$price', '$quantity')";
            mysqli_query($db_server, $sqlInsertProduct);
            move_uploaded_file($image['tmp_name'], $imageDestination);
            $_SESSION['message']['success'] = "Товар успішно додано";
            header('Location: warehouse.php');
            exit();
         } else {
            $message = "<p class='error_message'>Помилка завантаження файлу або файл завеликий</p>";
         }
      } else {
         $message = "<p class='error_message'>Неправильний формат файлу</p>";
      }
   }
}
?>
<div class="main" style="align-items: center;">
   <h2>Додати новий товар</h2>
   <?php
   include_once './comp/loged.php';
   echo $message;
   ?>
   <div class="form_container">
      <form method="post" enctype="multipart/form-data">
         <input type="text" name="name" id="name" placeholder="Введіть назву товару" required>
         <input type="number" name="price" id="price" placeholder="Введіть ціну товару" required>
         <input type="number" name="quantity" id="quantity" placeholder="Введіть кількість товару" required>
         <input type="file" name="image" id="file-upload" required>
         <button type="submit">Додати товар</button>
      </form>
   </div>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>