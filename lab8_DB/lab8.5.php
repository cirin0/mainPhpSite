<?php
$title = "Лабораторна робота №8";
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
?>
<h2>Завдання 5</h2>
<?php
$sqlDropTable = "DROP TABLE IF EXISTS warehouse";

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS warehouse (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL,
   image VARCHAR(100) NOT NULL,
   price DECIMAL(10, 2) NOT NULL,
   quantity INT(6) NOT NULL
)";

$sqlInsertData = "INSERT INTO warehouse (name, image, price, quantity)
VALUES 
('Білий гриб', 'https://www.arktisetaromit.fi/binary/file/-/fid/3323', 10.50, 100),
('Печериця', 'https://cdn.27.ua/799/62/1c/3629596_6.jpeg', 15.75, 50),
('Лисичка', 'https://www.arktisetaromit.fi/binary/file/-/fid/3323', 8.25, 80),
('Опеньки', 'https://upload.wikimedia.org/wikipedia/commons/2/2a/Mellea_ua.jpg', 12.00, 120)";

if ($db_server->query($sqlCreateTable) === FALSE) {
   echo "Помилка створення таблиці: " . $conn->error;
}
// mysqli_query($db_server, $sqlDropTable);
// mysqli_query($db_server, $sql_insert_data);

$sql_select_data = "SELECT * FROM warehouse";
$result = $db_server->query($sql_select_data);

if ($result->num_rows > 0) {
   echo "<table border='1'>";
   echo "<tr><th>Назва</th><th>Зображення</th><th>Ціна</th><th>Наявність</th></tr>";
   while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td><a href='product_details.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
      echo "<td><a href='product_details.php?id=" . $row['id'] . "'><img src='" . $row['image'] . "' alt='" . $row['name'] . "' width='250px'></a></td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['quantity'] . "</td>";
      echo "</tr>";
   }
   echo "</table>";
} else {
   echo "Немає даних про товари";
}
$db_server->close();
?>
<div class="next_task">
   <div>
      <a href="lab8.4.php">
         << Завдання 4 |</a>
            <a href="lab8.6.php">| Завдання 6 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>