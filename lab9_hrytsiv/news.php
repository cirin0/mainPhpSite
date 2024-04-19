<?php
$title = "Лабораторна робота 8№";
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання </h2>
<?php
// news.php

$newsId = $_GET['id'];
$sqlSelectOne = "SELECT * FROM hrytsiv_news WHERE id = $newsId";
$resultOne = mysqli_query($db_server, $sqlSelectOne);
$selectedNews = mysqli_fetch_assoc($resultOne);

// $newsId = $_GET['id']; // Отримуємо id новини з параметру URL

// Перевірка на існування id та коректність значення
if (!isset($news[$newsId])) {
   // Якщо id неправильне, можна перенаправити на сторінку помилки або просто вивести повідомлення
   echo "Новину не знайдено.";
   exit;
}

$selectedNews = $news[$newsId];
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $selectedNews['title']; ?></title>
</head>

<body>
   <h1><?php echo $selectedNews['title']; ?></h1>
   <p><strong>Date:</strong> <?php echo $selectedNews['date_published']; ?></p>
   <p><?php echo $selectedNews['content']; ?></p>
</body>

</html>

<div class="next_task">
   <div>

   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>