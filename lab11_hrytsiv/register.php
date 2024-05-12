<?php
session_start();
if (isset($_SESSION['login'])) {
   $_SESSION['message']['error'] = "Щоб зареєструватися, вийдіть з акаунту";
   header('Location: index.php');
   exit;
}
$title = "Реєстрація";
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
$_SESSION['validation'] = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = trim($_POST['name']);
   $surname = trim($_POST['surname']);
   $login = trim($_POST['login']);
   $password = ($_POST['password']);
   $repeat_password = ($_POST['repeat_password']);
   $user_category = $_POST['user_category'];
   $errors = [];
   if (!isValidName($name)) {
      $errors['name'] = "З великої літери на латині";
   }
   if (!isValidName($surname)) {
      $errors['surname'] = "З великої літери на латині";
   }
   if (!isValidEmail($login)) {
      $errors['login'] = "Email має бути від домену @pnu.edu.ua";
   }
   if (!isValidPassword($password)) {
      $errors['password'] = "Мінімум 6 символів, одна літера, цифра і спец символ";
   }
   if ($password !== $repeat_password) {
      $errors['repeat_password'] = "Паролі не співпадають";
   }
   if (!empty($errors)) {
      $_SESSION['validation'] = $errors;
   } else {
      $sqlSelect = "SELECT * FROM hrytsiv_users WHERE login = '$login' AND user_category = '$user_category'";
      $result = $db_server->query($sqlSelect);
      if ($result->num_rows > 0) {
         $_SESSION['message']['error'] = "Користувач з таким Email та Категорією вже зареєстрований";
      } else {
         $sqlInsert = "INSERT INTO hrytsiv_users (first_name, last_name ,login, password, repeat_password, user_category) VALUES ('$name', '$surname','$login', '$password', '$repeat_password', '$user_category')";
         if ($db_server->query($sqlInsert) === TRUE) {
            $_SESSION['message']['success'] = "Ви успішно зареєструвалися";
            header('Location: index.php');
            exit;
         } else {
            $_SESSION['message']['error'] = "Помилка реєстрації, спробуйте ще раз";
         }
      }
   }
}
?>
<div class="main">
   <h2>Реєстрація</h2>
   <?php
   printMessage();
   ?>
   <div class="form_container">
      <form method="post">
         <div style="width: 100%;">
            <div>
               <input type="text" name="name" id="name" placeholder="Введіть ваше ім'я" <?php isValid("name") ?>>
               <?php
               printError("name");
               ?>
            </div>
            <div>
               <input type="text" name="surname" id="surname" placeholder="Введіть ваше прізвище" <?php isValid("surname") ?>>
               <?php
               printError("surname");
               ?>
            </div>
            <div>
               <input type="email" name="login" id="login" placeholder="Введіть ваш Email@pnu.edu.ua" <?php isValid("login") ?>>
               <?php
               printError("login");
               ?>
            </div>
         </div>
         <div>
            <div class="register_pass">
               <input type="password" name="password" id="password" placeholder="Введіть ваш пароль">
               <input type="password" name="repeat_password" id="repeat_password" placeholder="Повторіть пароль">
               <?php
               ?>
            </div>
            <?php
            printError("password");
            printError("repeat_password");
            ?>
         </div>
         <label for="user_category">Категорія користувача</label>
         <select name="user_category" id="user_category">
            <option value="Seller">Продавець</option>
            <option value="Buyer">Покупець</option>
         </select><br>
         <button type="submit">Зареєструватися</button>
      </form>
   </div>
</div>

<?php
include_once 'footer.php';
require '../components/footer.php';
?>