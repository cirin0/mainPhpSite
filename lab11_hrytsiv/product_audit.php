<?php
session_start();
if ($_SESSION['user_category'] !== 'Seller') {
   header('Location: index.php');
   exit();
}
$title = "Додати товар";
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
include_once 'helper_function.php';
?>
<?php
$form_submitted = false;
?>
<div class="main">
   <h2>Аудит</h2>
   <?php
   include_once './comp/loged.php';
   ?>
   <?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $sqlSelect = "SELECT SUM(price * quantity) as total_price, SUM(quantity) as total_quantity FROM hrytsiv_storage";
      $result = mysqli_query($db_server, $sqlSelect);
      while ($row = mysqli_fetch_assoc($result)) {
         echo "<div class='success_audit forgot_pass'>";
         echo "<p>Загальна вартість товарів на складі: {$row['total_price']} грн.</p>";
         echo "<br>";
         echo "<p>Загальна кількість товарів на складі: {$row['total_quantity']} одиниць.</p>";
         echo "</div>";
      }
      $form_submitted = true;
   }
   ?>
   <?php if (!$form_submitted) : ?>
      <div class="form_container">
         <form method="post">
            <div class="form_products">
               <p>Загальна вартість товарів, яка наявна на складі:</p>
               <br>
               <button type="submit" name="audit">Аудит</button>
            </div>
         </form>
      </div>
   <?php endif; ?>
</div>
<?php
include_once 'footer.php';
include_once '../components/footer.php';
?>