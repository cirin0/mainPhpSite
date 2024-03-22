<?php
if (!empty($_GET["subdir"])) {
   echo "<p>Ім'я переданої змінної " . $_GET["subdir"];
} else {
   echo "<p>zminna subdir not found</p>";
}
$subdir = $_GET["subdir"];
echo "subdir=$subdir";
$dir = "";
$result = move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploaddir . $_FILES['uploadfile']['name']);
echo
"<div style = 'form_container' align='center'>
<form action='upload.php?subdir=$subdir' method='post' enctype='multipart/form-data'>
<input type='file' name='uploadfile'>
<input type='submit' value='Завантажити'>
</form></div>
<hr/>";
$uploaddir = "./files/$subdir/";
echo "<p>uploaddir=$uploaddir";
$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
echo "<p>uploadfile=$uploadfile";
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
   echo "<p>Файл завантажений на сервер";
} else {
   echo "<p>Файл не завантажений на сервер!";
}
echo "<p>Оригінальна назва " . $_FILES['uploadfile']['name'] . "</p>";
echo "<p>Тип файлу " . $_FILES['uploadfile']['type'] . "</p>";
echo "<p>Розмір " . $_FILES['uploadfile']['size'] . "</p>";
echo "<p>Тимчасове ім'я "  . $_FILES['uploadfile']['tmp_name'] . "</p>";
