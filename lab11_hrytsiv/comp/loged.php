<?php
if ($_SESSION['user_category'] === 'Seller') {
   echo "<div class='logged_main'>";
   echo "<p class='logged'>Ви увійшли як продавець під іменем {$_SESSION['login']}</p>";
   echo "</div>";
} elseif ($_SESSION['user_category'] === 'Buyer') {
   echo "<div class='logged_main'>";
   echo "<p class='logged'>Ви увійшли як покупець під іменем {$_SESSION['login']}</p>";
   echo "</div>";
}
