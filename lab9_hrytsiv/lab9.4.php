<?php
$title = "Лабораторна робота №9";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 4</h2>
<?php
$sqlSelect = "SELECT * FROM hrytsiv_news ORDER BY date_published DESC LIMIT 3";
$result = mysqli_query($db_server, $sqlSelect);
echo "<section>";
echo "<h2 style='margin-left: 200px;'>Головне:</h2>";
echo "<div class='news'>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<div style='display: flex; gap: 30px; align-items: center;'>";
   echo "<p style='margin-bottom: 3px; padding: 3px;'>" . $row['date_published'] . "</p>";
   echo "<li><a href='news.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
   echo "</div>";
}
echo "</ul>";
echo "</div>";
echo "</section>";

$sqlSelectTopics = "SELECT DISTINCT topic FROM hrytsiv_news";
$resultTopics = mysqli_query($db_server, $sqlSelectTopics);
echo "<div class='news'>";
while ($rowTopic = mysqli_fetch_assoc($resultTopics)) {
   $topic = $rowTopic['topic'];
   echo "<section>";
   echo "<h2 style='margin-left: 200px;'><a href='topic.php?topic=$topic'>$topic :</a></h2>";
   $sqlSelectByTopic = "SELECT * FROM hrytsiv_news WHERE topic='$topic' ORDER BY date_published DESC LIMIT 3   ";
   $resultByTopic = mysqli_query($db_server, $sqlSelectByTopic);

   echo "<ul>";
   while ($rowByTopic = mysqli_fetch_assoc($resultByTopic)) {
      echo "<div style='display: flex; gap: 30px; align-items: center;'>";
      echo "<p style='margin-bottom: 3px; padding: 3px;'>" . $rowByTopic['date_published'] . "</p>";
      echo "<li><a href='news.php?id=" . $rowByTopic['id'] . "'>" . $rowByTopic['title'] . "</a></li>";
      echo "</div>";
   }
   echo "</ul>";
   echo "</section>";
}
echo "</div>";
$totalNews = mysqli_num_rows(mysqli_query($db_server, "SELECT * FROM hrytsiv_news"));

file_put_contents("./files/out.txt", "Загальна кількість новин: " . $totalNews);

mysqli_close($db_server);
?>
<div class="next_task">
   <div>
      <a href="lab9.3.php">
         << Завдання 3 |</a>
            <a href="lab9.5.php">| Завдання 5>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>