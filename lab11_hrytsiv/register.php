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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = trim($_POST['name']);
   $surname = trim($_POST['surname']);
   $login = trim($_POST['login']);
   $password = ($_POST['password']);
   $repeat_password = ($_POST['repeat_password']);
   $user_category = $_POST['user_category'];
   if (!isValidName($name) || !isValidName($surname)) {
   } elseif (!isValidEmail($login)) {
   } elseif (!isValidPassword($password)) {
   } elseif ($password !== $repeat_password) {
      echo "<p class='error'>Паролі не співпадають</p>";
   } else {
      $sqlSelect = "SELECT * FROM hrytsiv_users WHERE login = '$login' AND user_category = '$user_category'";
      $result = $db_server->query($sqlSelect);
      if ($result->num_rows > 0) {
         $error = "<p class='error_message'>Користувач з таким Email та Категорією вже зареєстрований</p>";
      } else {
         $sqlInsert = "INSERT INTO hrytsiv_users (first_name, last_name ,login, password, repeat_password, user_category) VALUES ('$name', '$surname','$login', '$password', '$repeat_password', '$user_category')";
         if ($db_server->query($sqlInsert) === TRUE) {
            $_SESSION['message']['success'] = "Ви успішно зареєструвалися";
            header('Location: index.php');
            exit;
         } else {
            echo "<p class='error_message'>Помилка реєстрації, спробуйте ще раз</p>";
         }
      }
   }
}
?>
<div class="main">
   <h2>Реєстрація</h2>
   <?php
   echo $error;
   ?>
   <div class="form_container">
      <form method="post">
         <div style="width: 100%;">
            <div>
               <input type="text" name="name" id="name" placeholder="Введіть ваше ім'я">
               <?php
               if (empty(isValidName($name)))
                  echo "<small class='error'>З великої літери на латині</small>"
               ?>
            </div>
            <div>
               <input type="text" name="surname" id="surname" placeholder="Введіть ваше прізвище">
               <?php
               if (empty(isValidName($surname)))
                  echo "<small class='error error_sur'>З великої літери на латині</small>"
               ?>
            </div>
            <div>
               <input type="email" name="login" id="login" placeholder="Введіть ваш Email">
               <?php
               if (empty(isValidEmail($login)))
                  echo "<small class='error error_email'>Email має бути від домену @pnu.edu.ua</small>"
               ?>
            </div>
         </div>
         <div>
            <div class="register_pass">
               <input type="password" name="password" id="password" placeholder="Введіть ваш пароль">
               <input type="password" name="repeat_password" id="repeat_password" placeholder="Повторіть пароль">
            </div>
            <?php
            if (empty(isValidPassword($password)))
               echo "<small class='error error_pass'>Мінімум 6 символів, одна латинська літера, одна цифра і один спец символ</small>"
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