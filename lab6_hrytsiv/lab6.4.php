<?php
$title = "Лабораторна робота №6";
require '../components/header.php';
?>
<h2>Завдання 4</h2>

<?php
$errors = [];
$name = $surname = $login = $password = $confirmPassword = $email = '';


function validateInput($pattern, $input)
{
   return preg_match($pattern, $input);
}
function printError($errors, $key)
{
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!empty($errors[$key])) {
         echo '<small class="error">' . $errors[$key] . '</small>';
      } else {
         echo '<small class="valid">' . 'Правильно' . '</small>';
      }
   }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $login = $_POST['login'];
   $password = $_POST['password'];
   $repeatPassword = $_POST['repeatPassword'];
   $email = $_POST['email'];

   $namePattern = '/^[\p{Lu}][\p{Ll}\p{Lu}]*$/u';
   $loginPattern = '/^[a-z]+$/';
   $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/';
   $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

   if (empty($name)) {
      $errors['name'] = 'Введіть ім\'я';
   } else {
      $name = trim($name);
      if (!validateInput($namePattern, $name)) {
         $errors['name'] = 'Ім\'я повинно починатися з великої літери';
      }
   }
   if (empty($surname)) {
      $errors['surname'] = 'Введіть прізвище';
   } else {
      $surname = trim($surname);
      if (!validateInput($namePattern, $surname)) {
         $errors['surname'] = 'Прізвище повинно починатися з великої літери';
      }
   }
   if (empty($login)) {
      $errors['login'] = 'Введіть логін';
   } else {
      $login = trim($login);
      if (!validateInput($loginPattern, $login)) {
         $errors['login'] = 'Логін повинен містити тільки малі латинські літери';
      }
   }
   if (empty($password)) {
      $errors['password'] = 'Введіть пароль';
   } else {
      $password = trim($password);
      if (!validateInput($passwordPattern, $password)) {
         $errors['password'] = 'Пароль повинен містити принаймні 6 символів, літеру та цифру';
      }
   }
   if (empty($repeatPassword)) {
      $errors['repeat_password'] = 'Повторіть пароль';
   } else {
      $repeatPassword = trim($repeatPassword);
      if ($password !== $repeatPassword) {
         $errors['repeat_password'] = 'Паролі не співпадають';
      }
   }
   if (empty($email)) {
      $errors['email'] = 'Введіть електронну пошту';
   } else {
      $email = trim($email);
      if (!validateInput($emailPattern, $email)) {
         $errors['email'] = 'Eлектронна пошта введена невірно';
      }
   }
}
?>
<div class="form_container">
   <form method="post">
      <label for="name">Ім'я:</label>
      <input type="text" name="name" value="<?php echo $name; ?>">
      <?php
      printError($errors, 'name');
      ?>
      <br>
      <label for="surname">Прізвище:</label>
      <input type="text" name="surname" value="<?php echo $surname; ?>">
      <?php
      printError($errors, 'surname');
      ?>
      <br>
      <label for="login">Логін:</label>
      <input type="text" name="login" value="<?php echo $login; ?>">
      <?php
      printError($errors, 'login');
      ?>
      <br>
      <label for="password">Пароль:</label>
      <input type="password" name="password">
      <?php
      printError($errors, 'password');
      ?>
      <br>
      <label for="repeatPassword">Повторити пароль:</label>
      <input type="password" name="repeatPassword">
      <?php
      printError($errors, 'repeat_password');
      ?>
      <br>
      <label for="email">Електронна пошта:</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
      <?php
      printError($errors, 'email');
      ?>
      <br>
      <input type="submit" name="submit" value="Зареєструватися">
   </form>
</div>

<div class="next_task">
   <div>
      <a href="lab6.3.php">
         << Завдання 3 |</a>
            <a href="lab6.5.php">| Завдання 5 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>