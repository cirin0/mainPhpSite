<?php
$title = "Забули пароль?";
global $db_server;
$localEnvironment = false;
include_once '../components/header.php';
include_once './db/islocal.php';
if ($localEnvironment) {
   include_once './db/db copy.php';
} else {
   include_once './db/db.php';
}
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
?>
<div class="main">
   <h2>Відновлення паролю</h2>
   <?php
   include_once './comp/loged.php';
   $form_submitted = false;
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $user_category = $_POST['user_category'];
      $user_category_condition = implode("' OR user_category = '", $user_category);
      $sqlSelect = "SELECT login, password, user_category FROM hrytsiv_users WHERE login = '$email' AND user_category = '$user_category_condition'";
      $result = mysqli_query($db_server, $sqlSelect);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck > 0) {
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='success forgot_pass'>" . $row['login'] . "<br>" . "   Ваш '" . $row['user_category'] . "' пароль: " . $row['password'] . "</p>" . "<br>";
         }
      } else {
         echo "<p class='success forgot_pass'>Користувача з таким логіном та категорією не знайдено</p>";
      }
      $form_submitted = true;
   }
   ?>


   <?php if (!$form_submitted) : ?>
      <div class="form_container">
         <form method="post">
            <input type="email" name="email" id="email" placeholder="Введіть ваш логін" required>
            <div class="forgot_chesk">
               <label>Категорія користувача:</label>
               <div class="login_row">
                  <div>
                     <input type="checkbox" id="category1" name="user_category[]" value="Seller" checked>
                     <label for="category1">Seller</label>
                  </div>
                  <div>
                     <input type="checkbox" id="category2" name="user_category[]" value="Buyer">
                     <label for="category2">Buyer</label>
                  </div>
               </div>
            </div>
            <button type="submit">Нагадати</button>
         </form>
      </div>
   <?php endif; ?>
</div>
<br>

<?php
include_once 'footer.php';
require '../components/footer.php';
?>