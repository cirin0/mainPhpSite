<?php
$title = "Лабораторна робота №9";
global $db_server;
include_once '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 1-2</h2>
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

$sqlDrop = "DROP TABLE hrytsiv_news";
$sqlCreate = "CREATE TABLE hrytsiv_news (
   id INT(6) AUTO_INCREMENT PRIMARY KEY,
   topic VARCHAR(255) NOT NULL,
   title VARCHAR(255) UNIQUE,
   content TEXT NOT NULL,
   date_published VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// mysqli_query($db_server, $sqlDrop);
// mysqli_query($db_server, $sqlCreate);

$sqlSelect = "SELECT * FROM hrytsiv_news";
$result = mysqli_query($db_server, $sqlSelect);
$resultCheck = mysqli_num_rows($result);
echo "<div class='table'>";
echo "<table border='1'>";
echo "<tr><th>Topic</th><th>Title</th><th>Content</th><th>Date Published</th></tr>";
if ($resultCheck > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['topic'] . "</td><td>" . $row['title'] . "</td><td><p class='mobile'>" . $row['content'] . "</p></td><td class='dateP'>" . $row['date_published'] . "</td></tr>";
   }
}
echo "</table>";
echo "</div>";

mysqli_close($db_server);
fclose($fdataMy);
?>
<div class="next_task">
   <div>
      <a href="lab9.3.php">| Завдання 3>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>