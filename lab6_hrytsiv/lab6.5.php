<?php
$title = "Лабораторна робота №6";
require '../components/header.php';
?>
<h2>Завдання 5</h2>

<div class="form_container">
   <form method="post">
      <label for="postal_code">Країна: Індія<br>
         Вимоги для введення поштового індексу: <br> Шість цифр, перша цифра не нуль, пропуск після третьої цифри<br>
         Зразок коректного введення: 123 456</label><br>
      <input type="text" id="postal_code" name="postal_code" require><br>
      <input type="submit" value="Перевірити">
      <br>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $postal_code = $_POST['postal_code'];
         if (preg_match('/^[1-9][0-9]{2}\s[0-9]{3}$/', $postal_code)) {
            echo "Поштовий індекс введено коректно.";
         } elseif (preg_match('/^[0][0-9]{2}\s[0-9]{3}$/', $postal_code)) {
            echo "Поштовий індекс не має починатись з нуля";
         } else {
            echo "Поштовий індекс введено некоректно. Будь ласка, введіть індекс у форматі XXX XXX, де X - цифри.";
         }
      }
      ?>
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab6.4.php">
         << Завдання 4 |</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>