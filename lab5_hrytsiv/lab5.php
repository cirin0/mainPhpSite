<?php
require '../components/header.php';
?>

<h2>Прикладади</h2>
<div>
   <h3>Інформація про файл</h3>
   <?php
   $file = "lab5.php";
   infoFile($file);
   function infoFile($f)
   {
      if (!file_exists($f)) {
         echo "$f не знайдений!";
         return;
      }
      echo "$f - " . (is_file($f) ? "" : "не ") . "файл<br>";
      echo "$f - " . (is_dir($f) ? "" : "не ") . "каталог<br>";
      echo "$f " . (is_readable($f) ? "" : "не ") . "доступний для читання<br>";
      echo "$f " . (is_writable($f) ? "" : "не ") . "доступний для запису<br>";
      echo "размір $f в байтах - " . (filesize($f)) . "<br>";
      echo "остання зміна $f - " . (date("d MYH:i", filemtime($f))) . "<br>";
      echo "останнє звернення до $f - " . (date("d MYH:i", fileatime($f))) . "<br>";
   }
   ?>
</div>
<br>
<div>
   <h3>Читання рядків</h3>
   <?php
   $filename = "./files/ex1.txt";
   if (file_exists($filename)) {
      $fp = fopen($filename, "r");
      while (!feof($fp)) {
         echo (fgets($fp, 1024)) . "<br>";
      }
      fclose($fp);
   } else {
      echo "Файл не знайдено!";
   }
   ?>
</div>
<br>
<div>
   <h3>Виведення на екран другої половини файлу</h3>
   <?php
   if (file_exists($filename)) {
      $fp = fopen($filename, "r");
      $fsize = filesize($filename);
      $half = (int)($fsize / 2);
      fseek($fp, $half);
      echo (fread($fp, ($fsize - $half)));
   } else {
      echo "Файл не знайдено!";
   }
   ?>
</div>
<br>
<div>
   <h3>Запис і додавання в файл</h3>
   <?php
   if (file_exists("./files/ex2.txt")) {
      $fp = fopen("./files/ex2.txt", "w");
      fputs($fp, " Запис в файл \n");
      fclose($fp);
      $fp = fopen("./files/ex2.txt", "a");
      fputs($fp, " Додавання в кінець файлу ");
      fclose($fp);
   } else {
      echo "Файл не знайдено!";
   }
   echo "Результат:<br>";
   $fr = file_get_contents("./files/ex2.txt");
   echo nl2br($fr);
   ?>
</div>
<br>
<div>
   <h3>Завантаження файлу</h3>
   <a href="upload.php">Приклад</a>
</div>

<div class="next_task">
   <div>
      <a href="lab5.2.php">Завдання 2 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>