<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 7</h2>
<div class="form_container">
   <form class="limit" method="post">
      <h3>Запитання 1: Який ваш улюблений колір?</h3>
      <div>
         <input type="radio" id="color1" name="color" value="Червоний">
         <label for="color1">Червоний</label><br>
         <input type="radio" id="color2" name="color" value="Синій">
         <label for="color2">Синій</label><br>
         <input type="radio" id="color3" name="color" value="Зелений">
         <label for="color3">Зелений</label><br>
      </div>
      <h3>Запитання 2: Виберіть вашу вікову категорію</h3>
      <div>
         <select name="age">
            <option value="До 18 років">До 18 років</option>
            <option value="18-30 років">18-30 років</option>
            <option value="31-50 років">31-50 років</option>
            <option value="Більше 50 років">Більше 50 років</option>
         </select>
      </div>

      <h3>Запитання 3: Оберіть вашу улюблену мову програмування (можна обрати більше одного варіанту)</h3>
      <div>
         <input type="checkbox" id="lang1" name="languages[]" value="PHP">
         <label for="lang1">PHP</label><br>
         <input type="checkbox" id="lang2" name="languages[]" value="JavaScript">
         <label for="lang2">JavaScript</label><br>
         <input type="checkbox" id="lang3" name="languages[]" value="Python">
         <label for="lang3">Python</label>
      </div>

      <h3>Запитання 4: Як ви вважаєте, що є основною перевагою використання PHP?</h3>
      <div>
         <input type="radio" id="advantage1" name="advantage" value="Простота вивчення">
         <label for="advantage1">Простота вивчення</label><br>
         <input type="radio" id="advantage2" name="advantage" value="Широкі можливості">
         <label for="advantage2">Широкі можливості</label><br>
         <input type="radio" id="advantage3" name="advantage" value="Швидкодія">
         <label for="advantage3">Швидкодія</label>
      </div>

      <br><input type="submit" value="Готово">
   </form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (
      isset($_POST['color']) && isset($_POST['age']) &&
      isset($_POST['languages']) && isset($_POST['advantage'])
   ) {
      $color = $_POST['color'];
      $age = $_POST['age'];
      $languages = $_POST['languages'];
      $advantage = $_POST['advantage'];

      echo "<h3>Запитання 1: Який ваш улюблений кольор?</h3>";
      echo "Ваша відповідь: <b>$color</b><br>";

      echo "<h3>Запитання 2: Виберіть вашу вікову категорію</h3>";
      echo "Ваша відповідь: <b>$age</b><br>";

      echo "<h3>Запитання 3: Оберіть вашу улюблену мову програмування</h3>";
      echo "Ваша відповідь:";
      foreach ($languages as $language) {
         echo "<b>$language</b> ";
      }
      echo "<br>";

      echo "<h3>Запитання 4: Як ви вважаєте, що є основною перевагою використання PHP?</h3>";
      echo "Ваша відповідь: <b>$advantage</b><br>";
   } else {
      echo "Будь ласка, заповніть всі поля форми.";
   }
}
?>

<div class="next_task">
   <div>
      <a href="lab4.6.php">
         << Завдання 6 |</a>
            <a href="lab4..php">| Завдання >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>