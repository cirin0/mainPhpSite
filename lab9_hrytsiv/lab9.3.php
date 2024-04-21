<?php
$title = "Лабораторна робота №9";
global $db_server;
include_once '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 3</h2>
<?php
$file = "./files/mynews.txt";

$fdataMy = fopen($file, "r") or die("Не вдалося відкрити файл");
$mas = fread($fdataMy, filesize($file));

$mas = explode(" &", $mas);
$news = [];
foreach ($mas as $record) {
   $masVidm = explode("~ ", $record);
   $topic = trim($masVidm[0]);
   $title = $masVidm[1];
   $content = $masVidm[2];
   $date_published = $masVidm[3];

   $news[] = [
      'topic' => $topic,
      'title' => $title,
      'content' => $content,
      'date_published' => $date_published
   ];
   $sql = "INSERT INTO hrytsiv_news (topic, title, content, date_published) VALUES ('$topic', '$title', '$content', '$date_published')";
   // mysqli_query($db_server, $sql);
}

$idList = [9, 10, 11, 12];
$idsStr = implode(",", $idList);

$sqlSelect = "SELECT * FROM hrytsiv_news WHERE id IN ($idsStr)";

$result = mysqli_query($db_server, $sqlSelect);
echo "<table border='1'>";
echo "<tr><th>Topic</th><th>Title</th><th>Content</th><th>Date Published</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row['topic'] . "</td><td>" . $row['title'] . "</td><td>" . $row['content'] . "</td><td class='dateP'>" . $row['date_published'] . "</td></tr>";
}
echo "</table>";

mysqli_close($db_server);
fclose($fdataMy);
?>
<div class="next_task">
   <div>
      <a href="lab9.php">
         << Завдання 1-2 |</a>
            <a href="lab9.4.php">| Завдання 4>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>