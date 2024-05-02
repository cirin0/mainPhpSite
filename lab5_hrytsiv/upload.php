<?php
if (isset($_GET["subdir"])) {
   echo "<p>Ім'я переданої змінної " . $_GET["subdir"];
   $subdir = $_GET["subdir"];
} else {
   $subdir = "files";
   echo "<p>Змінну subdir не знайдено</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploadfile'])) {
   $uploaddir = "./$subdir/";
   $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);

   if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
      echo "<p>Файл завантажений на сервер: $uploadfile</p>";
   } else {
      echo "<p>Помилка завантаження файлу!</p>";
   }
   echo "<p>Оригінальна назва: " . $_FILES['uploadfile']['name'] . "</p>";
   echo "<p>Тип файлу: " . $_FILES['uploadfile']['type'] . "</p>";
   echo "<p>Розмір: " . $_FILES['uploadfile']['size'] . " байт</p>";
   echo "<p>Тимчасове ім'я: " . $_FILES['uploadfile']['tmp_name'] . "</p>";
}
echo "
<div style='form_container' align='center'>
   <form action='upload.php?subdir=$subdir' method='post' enctype='multipart/form-data'>
      <input type='file' name='uploadfile'>
      <input type='submit' value='Завантажити'>
   </form>
</div>";
echo "<hr>";
