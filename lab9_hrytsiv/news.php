<?php
$title = "Лабораторна робота №9";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Новини</h2>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
   $newsId = $_GET['id'];
   $sqlSelectOne = "SELECT * FROM hrytsiv_news WHERE id = $newsId";
   $resultOne = mysqli_query($db_server, $sqlSelectOne);
   $news = [];
   if (mysqli_num_rows($resultOne) > 0) {
      while ($row = mysqli_fetch_assoc($resultOne)) {
         $news[] = $row;
      }
      foreach ($news as $item) {
         echo "<h2>" . $item['title'] . "</h2>";
         echo "<p><strong>Date:</strong>" . $item['date_published'] . "</p><br>";
         echo "<p class='content'>" . $item['content'] . "</p>";
      }
   } else {
      echo "Новину не знайдено";
   }
}
mysqli_close($db_server);
?>
<div class="next_task">
   <div>
      <a href="lab9.4.php">
         << Повернутись до новин |</a>
            <a href="lab9.5.php">| Завдання 5>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>