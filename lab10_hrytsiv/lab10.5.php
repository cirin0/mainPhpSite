<?php
session_start();
$title = "Лабораторна робота №10";
global $db_server;
require '../components/header.php';
// include_once '../db copy.php';
include_once '../db.php';
$db_server->set_charset("utf8");
?>
<h2>Завдання 5</h2>
<?php
$sqlCreate = "CREATE TABLE user_for_session (
   id INT AUTO_INCREMENT PRIMARY KEY,
   login VARCHAR(50) UNIQUE,
   password VARCHAR(255),
   age INT
)";
// mysqli_query($db_server, $sqlCreate);
if (isset($_SESSION['login'])) {
   echo "<p>Ви увійшли як користувач {$_SESSION['login']}</p>";
} else {
   echo "<p>Ви увійшли як гість</p>";
   echo '<a href="lab10.6.php">Авторизуйтесь</a>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $login = $_POST["login"];
   $password = ($_POST["password"]);
   $age = $_POST["age"];

   $sql = "INSERT INTO user_for_session (login, password, age) VALUES ('$login', '$password', '$age')";

   if (mysqli_query($db_server, $sql)) {
      echo "Реєстрація пройшла успішно!";
   } else {
      echo "Помилка: " . $sql . "<br>" . mysqli_error($db_server);
   }
}
?>
<div class="form_container">
   <form method="POST">
      <label for="login">Ім'я:</label>
      <input type="text" name="login" placeholder="Your login:" required>
      <label for="password">Пароль:</label>
      <input type="password" name="password" placeholder="Your password:" required>
      <label for="age">Вік:</label>
      <input type="number" name="age" placeholder="Your age:" required>
      <input type="submit" value="Sign up!">
   </form>
</div>


<?php
$sqlSelect = "select * from user_for_session order by id";
$query_res = mysqli_query($db_server, $sqlSelect);
if ($query_res->num_rows > 0) {
   echo "<table border='2'><tr><th>ID</th><th>Login</th><th>Age</th><th>Password</th></tr>";
   while ($row = $query_res->fetch_assoc()) {
      echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["age"] . "</td><td>" . $row["password"] . "</td></tr>";
   }
   echo "</table>";
} else {
   echo "Записів не знайдено!";
}
mysqli_close($db_server);
?>

<div class="next_task">
   <div>
      <a href="lab10.php">
         << Завдання 1|</a>
            <a href="lab10.6.php">| Завдання 6 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>