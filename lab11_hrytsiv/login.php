<?php
session_start();
if (isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Вийдіть з аккаунту, щоб змінити користувача";
   header('Location: index.php');
   exit;
}
$title = "Магазин домашніх тварин";
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
?>
<?php
// print_r($_SESSION);
if (isset($_SESSION['message'])) {
   echo "<div class='info'>";
   if ($_SESSION['message']) {
      echo "<p class='error_message'>" . $_SESSION['message']['error'] . "</p>";
   } elseif ($_SESSION['message']) {
      echo "<p class='success_message'>" . $_SESSION['message']['success'] . "</p>";
   }
   unset($_SESSION['message']);
   echo "</div>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $user_category = $_POST['user_category'];
   foreach ($user_category as $category) {
      $user_category = $category;
   }
   $sqlSelect = "SELECT * FROM hrytsiv_users WHERE login = '$email' AND password = '$password' AND user_category = '$category'";
   $result = mysqli_query($db_server, $sqlSelect);
   $resultCheck = mysqli_num_rows($result);
   if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $_SESSION['login'] = $row['first_name'] . ' ' . $row['last_name'];
         $_SESSION['user_category'] = $row['user_category'];
         header('Location: index.php');
      }
   } else {
      echo "<p class='error_message'>Користувача з таким логіном, паролем та категорією не знайдено</p>";
   }
}
?>
<div class="main">
   <h1>Вхід</h1>
   <div class="form_container">
      <form method="post">
         <input type="email" name="email" id="email" placeholder="Введіть ваш Email" value="test@gmail.com" required>
         <input type="password" name="password" id="password" placeholder="Введіть ваш пароль" value="1234" required>
         <div class="forgot_chesk login_chesk">
            <label>Категорія користувача:</label>
            <div class="login_row">
               <div>
                  <input type="checkbox" id="category1" name="user_category[]" value="Seller">
                  <label for="category1">Seller</label>
               </div>
               <div>
                  <input type="checkbox" id="category2" name="user_category[]" value="Buyer">
                  <label for="category2">Buyer</label>
               </div>
            </div>
         </div>
         <button type="submit">Увійти</button>
      </form>
   </div>
</div>

<?php
include_once 'footer.php';
require '../components/footer.php';
?>