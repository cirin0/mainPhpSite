<?php
$title = "Лабораторна робота №9";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 6</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $topic = $_POST['topic'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $date_published = date("Y-m-d H:i:s");
   $sqlInsert = $db_server->prepare("INSERT INTO hrytsiv_news (topic, title, content, date_published) VALUES (?, ?, ?, ?)");
   $sqlInsert->bind_param("ssss", $topic, $title, $content, $date_published);
   if ($sqlInsert->execute()) {
      echo "Новина успішно додана";
   } else {
      echo "Помилка: " . $db_server->error;
   }
   $sqlInsert->close();
}
mysqli_close($db_server);
?>
<div class="form_container">
   <form method="POST">
      <label for="topic">Тематика:</label>
      <input type="text" id="topic" name="topic" required>
      <label for="title">Заголовок:</label>
      <input type="text" id="title" name="title" required>
      <label for="content">Контент:</label>
      <textarea id="content" name="content" rows="4" cols="50" required></textarea>
      <input type="submit" value="Додати новину">
   </form>
</div>
<div class="next_task">
   <div>
      <a href="lab9.5.php">
         << Завдання 5 |</a>
            <a href="lab9.php">| Завдання 1 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>