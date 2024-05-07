<?php
session_start();
?>
<section class="header">
   <ul class="header__menu">
      <li class="header__link"><a href="index.php">Головна</a></li>
      <li class="header__link"><a href="login.php">Вхід</a></li>
      <?php
      if (!isset($_SESSION['login'])) {
         echo "<li class='header__link'><a href='register.php'>Реєстрація</a></li>";
      } else {
         echo "<li class='header__link'><a href='register.php'>Реєстрація</a></li>";
      }
      ?>
      <li class="header__link"><a href="forgot-password.php">Забули пароль</a></li>
      <li class="header__link"><a href="registered-users.php">Зареєстровані користувачі</a></li>
      <li class="header__link"><a href="warehouse.php">Склад</a></li>
      <?php
      if ($_SESSION['user_category'] === 'Buyer') {
         echo '<li class="header__link"><a href="cart.php">Кошик</a></li>';
      }
      ?>
      <?php
      if (isset($_SESSION['login'])) {
         echo "<li class='header__link'><a href='logout.php'>Вихід</a></li>";
      }
      ?>
   </ul>
</section>