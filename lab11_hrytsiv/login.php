<?php
$title = "Магазин домашніх тварин";
global $db_server;
require '../components/header.php';
include_once '../db copy.php';
// include_once '../db.php';
$db_server->set_charset("utf8");
?>
<?php
include_once 'action.php';
?>
<h1>Вхід</h1>
<?php

?>
<div class="form_container">
   <form method="post">
      <input type="email" name="email" id="email" placeholder="Введіть ваш Email" required>
      <input type="password" name="password" id="password" placeholder="Введіть ваш пароль" required>
      <div class="forgot_chesk login_chesk">
         <label>Категорія користувача:</label>
         <div class="login_row">
            <div>
               <input type="checkbox" id="category1" name="user_category[]" value="Seller">
               <label for="category1">Seller</label>
            </div>
            <div>
               <input type="checkbox" id="category2" name="user_category[]" value="Buyer">
               <label for="category2">Buyer</label>
            </div>
         </div>
      </div>
      <button type="submit">Увійти</button>
   </form>
</div>

<?php
require '../components/footer.php';
?>