<?php
$title = "Лабораторна робота №9";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 5</h2>
<?php
$sqlDelete = "DELETE FROM hrytsiv_news WHERE id = 5";
mysqli_query($db_server, $sqlDelete);
$sqlSelect = "SELECT id, topic, title, date_published FROM hrytsiv_news";
$result = mysqli_query($db_server, $sqlSelect);
echo "<div class='table'>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Topic</th><th>Title</th><th>Date Published</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>" . $row['id'] . "</td><td>" . $row['topic'] . "</td><td>" . $row['title'] . "</td><td class='dateP'>" . $row['date_published'] . "</td></tr>";
}
echo "</table>";
echo "</div>";

mysqli_close($db_server);
?>
<div class="next_task">
   <div>
      <a href="lab9.4.php">
         << Завдання 4 |</a>
            <a href="lab9.6.php">| Завдання 6>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>