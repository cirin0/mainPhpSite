<?php
session_start();
$title = "Реєстрація";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
?>
<h1>Реєстрація</h1>
<br>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $login = $_POST['login'];
   $password = $_POST['password'];
   $repeat_password = $_POST['repeat_password'];
   $user_category = $_POST['user_category'];
   $sqlInsert = "INSERT INTO hrytsiv_users (first_name, last_name ,login, password, repeat_password, user_category) VALUES ('$name', '$surname','$login', '$password', '$repeat_password', '$user_category')";
   if ($password === $repeat_password) {
      if ($db_server->query($sqlInsert) === TRUE) {
         $_SESSION['success_message'] = "Ви успішно зареєструвалися</p>";
         header('Location: index.php');
         exit;
      } else {
         echo "<p class='success'>Помилка реєстрації, спробуйте ще раз</p>";
      }
   } else {
      echo "<p class='success'>Паролі не співпадають</p>";
   }
}
?>
<div class="form_container">
   <form method="post">
      <input type="text" name="name" id="name" placeholder="Введіть ваше ім'я" required>
      <input type="text" name="surname" id="surname" placeholder="Введіть ваше прізвище" required>
      <input type="email" name="login" id="login" placeholder="Введіть ваш Email" required>
      <div class="register_pass">
         <input type="password" name="password" id="password" placeholder="Введіть ваш пароль" required>
         <input type="password" name="repeat_password" id="repeat_password" placeholder="Повторіть пароль" required>
      </div>
      <label for="user_category">Категорія користувача</label>
      <select name="user_category" id="user_category">
         <option value="Seller">Продавець</option>
         <option value="Buyer">Покупець</option>
      </select><br>
      <button type="submit">Зареєструватися</button>
   </form>
</div>

<?php
require '../components/footer.php';
?>