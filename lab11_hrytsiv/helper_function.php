<?php
function updateProductQuantity($productId, $quantityChange): void
{
   global $db_server;
   $sqlSelectQuantity = "SELECT quantity FROM hrytsiv_storage WHERE id = $productId";
   $result = mysqli_query($db_server, $sqlSelectQuantity);

   if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $currentQuantity = $row['quantity'];
      if ($currentQuantity >= $quantityChange) {
         $newQuantity = $currentQuantity - $quantityChange;

         $sqlUpdateQuantity = "UPDATE hrytsiv_storage SET quantity = $newQuantity WHERE id = $productId";
         $updateResult = mysqli_query($db_server, $sqlUpdateQuantity);

         if (!$updateResult) {
            $_SESSION['message']['error'] = "Помилка оновлення кількості товару в базі даних";
            header('Location: index.php');
            exit();
         }
      } else {
         $_SESSION['message']['error'] = "Недостатня кількість товару на складі";
         header('Location: index.php');
         exit();
      }
   } else {
      $_SESSION['message']['error'] = "Товар не знайдено в базі даних";
      header('Location: index.php');
      exit();
   }
}

function printMessage(): void
{
   if (isset($_SESSION['message'])) {
      echo "<div class='info'>";
      if ($_SESSION['message']['error']) {
         echo "<p class='error_message'>" . $_SESSION['message']['error'] . "</p>";
      } else {
         echo "<p class='success_message'>" . $_SESSION['message']['success'] . "</p>";
      }
      unset($_SESSION['message']);
      echo "</div>";
   }
}

function isValidName($name)
{
   return preg_match('/^[A-Z][a-z]+$/', $name);
}

function isValidEmail($email)
{
   return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@pnu\.edu\.ua$/', $email);
}

function isValidPassword($password)
{
   return strlen($password) >= 6 && preg_match('/[a-zA-Z]/', $password) && preg_match('/\d/', $password) && preg_match('/[_\-.@#$%^&!?\*]/', $password);
}

function isValid(string $fieldName): void
{
   if (!isset($_SESSION['validation'][$fieldName])) {
      echo "value='{$_POST[$fieldName]}'";
   }
}

function printError(string $fieldName): void
{
   if (isset($_SESSION['validation'][$fieldName])) {
      echo "<small class='error $fieldName'>{$_SESSION['validation'][$fieldName]}</small>";
   }
}
