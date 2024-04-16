<?php
$title = "Лабораторна робота №9";
global $db_server;
include_once '../components/header.php';
include_once '../db copy.php';
?>
<h2>Завдання</h2>
<?php
$file = "./files/mynews.txt";

$fdataMy = fopen($file, "r") or die("Не вдалося відкрити файл");
$mas = fread($fdataMy, filesize($file));

$mas = explode("&", $mas);
foreach ($mas as $record) {
   $masVidm = explode("~", $record);
   $topic = $masVidm[0];
   $title = $masVidm[1];
   $content = $masVidm[2];
   $date_published = $masVidm[3];

   // Виконуємо запит до бази даних
   $sql = "INSERT INTO hrytsiv_news (topic, title, content, date_published) VALUES ('$topic', '$title', '$content', '$date_published')";

   // Перед виконанням цього запиту переконайтесь, що $db_server вказує на з'єднання з базою даних
   // mysqli_query($db_server, $sql);
}

$sqlSelect = "SELECT * FROM hrytsiv_news";
$result = mysqli_query($db_server, $sqlSelect);
$resultCheck = mysqli_num_rows($result);
echo "<table border='1'>";
echo "<tr><th>Topic</th><th>Title</th><th>Content</th><th>Date Published</th></tr>";
if ($resultCheck > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['topic'] . "</td><td>" . $row['title'] . "</td><td>" . $row['content'] . "</td><td class='dateP'>" . $row['date_published'] . "</td></tr>";
   }
}
echo "</table>";

$sqlDrop = "DROP TABLE hrytsiv_news";
$sqlCreate = "CREATE TABLE hrytsiv_news (
   id INT(6) AUTO_INCREMENT PRIMARY KEY,
   topic VARCHAR(255) NOT NULL,
   title VARCHAR(255) NOT NULL,
   content VARCHAR(1000) NOT NULL,
   date_published VARCHAR(255) NOT NULL
)";
// mysqli_query($db_server, $sqlDrop);
// mysqli_query($db_server, $sqlCreate);

fclose($fdataMy);
?>
<div class="next_task">
   <div>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>