<?php
$title = "Зареєстровані користувачі";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
?>
<?php
include_once 'action.php';
?>
<div class='main'>
   <h2>Зареєстровані користувачі</h2>
   <?php
   include_once './comp/loged.php';
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
</div>
<?php
include_once 'footer.php';
require '../components/footer.php';
?>