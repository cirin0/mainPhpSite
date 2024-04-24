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
if (isset($_GET['topic']) && !empty($_GET['topic'])) {
   $topic = $_GET['topic'];
   $sqlCheckTopic = "SELECT COUNT(*) as count FROM hrytsiv_news WHERE topic='$topic'";
   $resultCheckTopic = mysqli_query($db_server, $sqlCheckTopic);
   $rowCheckTopic = mysqli_fetch_assoc($resultCheckTopic);
   $topicCount = $rowCheckTopic['count'];
   if ($topicCount > 0) {
      $sqlSelectTopics = "SELECT * FROM hrytsiv_news WHERE topic='$topic'";
      $resultTopics = mysqli_query($db_server, $sqlSelectTopics);
      echo "<h2>$topic:</h2>";
      echo "<div class='news'>";
      echo "<ul>";
      while ($row = mysqli_fetch_assoc($resultTopics)) {
         echo "<li><a href='news.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
      }
      echo "</ul>";
      echo "</div>";
   } else {
      echo "Тематику не знайдено";
   }
} else {
   echo "Тематика не вказана";
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