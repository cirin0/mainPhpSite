<?php
$title = "Лабораторна робота №9";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 4</h2>
<?php
$sqlSelect = "SELECT * FROM hrytsiv_news ORDER BY date_published DESC LIMIT 3";
$result = mysqli_query($db_server, $sqlSelect);
echo "<h2>Головне:</h2>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<li><a href='news.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></li>";
}
echo "</ul>";

$sqlSelectTopics = "SELECT DISTINCT topic FROM hrytsiv_news";
$resultTopics = mysqli_query($db_server, $sqlSelectTopics);

while ($rowTopic = mysqli_fetch_assoc($resultTopics)) {
   $topic = $rowTopic['topic'];
   echo "<h2><a href='topic.php?topic=$topic'>$topic</a>:</h2>";
   $sqlSelectByTopic = "SELECT * FROM hrytsiv_news WHERE topic='$topic'";
   $resultByTopic = mysqli_query($db_server, $sqlSelectByTopic);

   echo "<ul>";
   while ($rowByTopic = mysqli_fetch_assoc($resultByTopic)) {
      echo "<li><a href='news.php?id=" . $rowByTopic['id'] . "'>" . $rowByTopic['title'] . "</a></li>";
   }
   echo "</ul>";
}
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