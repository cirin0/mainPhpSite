<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 6</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (
      isset($_POST['surname']) && isset($_POST['name']) &&
      isset($_POST['email']) && isset($_POST['password']) &&
      isset($_POST['confirm_password'])
   ) {
      $surname = $_POST['surname'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      if ($password !== $confirm_password) {
         echo "Паролі не співпадають. Будь ласка, введіть однакові паролі.";
      } else {
         $data = [
            'Прізвище' => $surname,
            'Ім\'я' => $name,
            'E-mail' => $email,
            'Пароль' => $password,
         ];

         echo "<h2>Введені дані:</h2>";
         echo "<table border='1'>";
         foreach ($data as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
         }
         echo "</table>";
      }
   } else {
      echo "Будь ласка, заповніть всі поля форми.";
   }
}
?>
<div class="form_container">
   <form method="post">
      <label for="surname">Прізвище:</label>
      <input type="text" id="surname" name="surname" required>

      <label for="name">Ім'я:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Пароль:</label>
      <input type="password" id="password" name="password" required>

      <label for="confirm_password">Повторіть пароль:</label>
      <input type="password" id="confirm_password" name="confirm_password" required>

      <input type="submit" value="Готово">
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab4.5.php">
         << Завдання 5 |</a>
            <a href="lab4.7.php">| Завдання 7 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>