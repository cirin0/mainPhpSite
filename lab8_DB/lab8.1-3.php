<?php
$title = "Лабораторна робота №8";
require_once '../components/header.php';
include_once '../db.php';
// include_once '../db copy.php';
?>
<h2>Завдання 1-3</h2>
<?php
$sql = "drop table if exists dusc";
$sql1 = "create table if not exists dusc(id integer primary key auto_increment, name_d varchar(100) unique, key_concept varchar(250))";
$sql2 = "insert into dusc (name_d, key_concept) values ('Networks', 'HTTPS')";
$sql3 = "insert into dusc (name_d, key_concept) values ('AI','Modeling dfbdsf')";

$db_server->query($sql);
$db_server->query($sql1);
$db_server->query($sql2);
$db_server->query($sql3);
?>

<table border="2">
   <h2>Fetch result:</h2>
   <tr>
      <th>Name</th>
      <th>Key concept</th>
   </tr>
   <?php
   $query_res = $db_server->query("select * from dusc");
   if ($query_res->num_rows > 0) {
      while ($row = $query_res->fetch_row()) {
         echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
      }
   } else {
      echo "0 results";
   }
   $db_server->close();
   ?>
</table>

<div class="next_task">
   <div>
      <a href="lab8.4.php">| Завдання 4>></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require_once '../components/footer.php';
?>