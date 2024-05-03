<?php
$title = "Зареєстровані користувачі";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
?>
<h1>Зареєстровані користувачі</h1>
<br>
<?php
$query = "SELECT * FROM hrytsiv_users";
$result = mysqli_query($db_server, $query);
$resultCheck = mysqli_num_rows($result);
echo "<div class='table'>";
echo "<table border='1'>";
echo "<tr><th>Ім'я</th><th>Прізвище</th><th>Логін</th><th>Пароль</th><th>Категорія користувача</th></tr>";
if ($resultCheck > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['login'] . "</td><td>" . $row['password'] . "</td><td>" . $row['user_category'] . "</td></tr>";
   }
}
echo "</table>";
echo "</div>";
mysqli_close($db_server);

?>

<?php
require '../components/footer.php';
?>