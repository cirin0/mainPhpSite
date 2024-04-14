<?php
$title = "Лабораторна робота №8";
require_once '../components/header.php';
include_once '../db.php';
// include_once '../db copy.php';
?>
<h2>LAB DB - TASK 4</h2>
<?php
$sql = "drop table if exists users";
$sql1 = "create table if not exists users(id integer primary key auto_increment, age integer, login varchar(250) unique, password varchar(100))";
$sql2 = "insert into users (age, login, password) values (?, ?, ?)";

// mysqli_query($db_server, $sql);
// mysqli_query($db_server, $sql1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $age = $_POST["age"];
   $login = $_POST["login"];
   $password = $_POST["password"];
   if (isset($_POST["age"], $_POST["login"], $_POST["password"])) {
      $stmt = $db_server->prepare($sql2);
      $stmt->bind_param("iss", $age, $login, $password);
      if ($stmt->execute()) {
         echo "New record created successfully";
      } else {
         echo "Error: " . $sql2 . "<br>" . $db_server->error;
      }
   } else {
      echo "Error: Unable to prepare statement.";
   }
}
?>

<div class="form_container">
   <form method="POST">
      <label for="age">Вік:</label>
      <input type="text" name="age" placeholder="Your age:" required>
      <label for="login">Ім'я:</label>
      <input type="text" name="login" placeholder="Your login:" required>
      <label for="password">Пароль:</label>
      <input type="password" name="password" placeholder="Your password:" required>
      <input type="submit" value="Sign up!">
   </form>
</div>

<table border="2">
   <tr>
      <th>ID</th>
      <th>Login</th>
      <th>Age</th>
      <th>Password</th>
   </tr>
   <?php
   $sqlDelete = "delete from users where id='3'";
   //  $query_res1 = mysqli_query($db_server, $sqlDelete);
   $sqlSelect = "select * from users order by id";
   $query_res = mysqli_query($db_server, $sqlSelect);
   if ($query_res->num_rows > 0) {
      while ($row = $query_res->fetch_assoc()) {
         echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["age"] . "</td><td>" . $row["password"] . "</td></tr>";
      }
   } else {
      echo "0 results";
   }
   $db_server->close();
   ?>
</table>

<div class="next_task">
   <div>
      <a href="lab8.1-3.php">
         << Завдання 1-3 |</a>
            <a href="lab8.5.php">| Завдання 5 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require_once '../components/footer.php';
?>