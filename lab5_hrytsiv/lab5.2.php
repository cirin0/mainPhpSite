<?php
require '../components/header.php';
?>
<h2>Завдання 2</h2>
<div class="form_container">
   <form method="post">
      <label for="filename">Введіть ім'я файла:</label>
      <input type="text" id="filename" name="filename" placeholder="Зразок.txt" required>
      <?php
      $files = scandir(__DIR__);
      echo "<h4>Файли та каталоги у поточному каталозі:</h4>";
      foreach ($files as $file) {
         if ($file != '.' && $file != '..') {
            echo "$file<br>";
         }
      }
      echo "<br>";
      ?>
      <input type="submit" name="submit" value="Готово">
   </form>
   <?php
   if (isset($_POST['submit'])) {
      $filename = $_POST['filename'];
      if (file_exists($filename)) {
         echo "<p>Файл \"$filename\" у поточному каталозі існує.</p>";
         echo "<p>Розмір файла: " . filesize($filename) . " байт</p>";
         echo "<p>Час створення: " . date("Y-m-d H:i:s", filectime($filename)) . "</p>";
         echo "<p>Час останньої модифікації: " . date("Y-m-d H:i:s", filemtime($filename)) . "</p>";
         echo "<p>Вміст файла:</p>";
         echo '<div style = "max-width: 50%; margin:auto">';
         echo file_get_contents($filename);
         echo "</div>";
      } else {
         echo "<p>Файл з іменем \"$filename\" у поточному каталозі не існує.</p>";
      }
   }
   ?>
</div>
<div class="next_task">
   <div>
      <a href="lab5.php">
         << Завдання 1 |</a>
            <a href="lab5.3.php">| Завдання 3 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>