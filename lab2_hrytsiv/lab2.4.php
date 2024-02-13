<?php
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <title>Лабораторна робота №2</title>
</head>

<body>
   <div class="wrapper">
      <h3>Виберіть, будь ласка, зображення кота разом з собакою</h3>
      <div class="form_container form_task4">
         <form id="SubmitForm" method="post">
            <label>
               <input type="radio" name="catDog">
               <img src="./images/cat-with-dog.jpg" alt="Кіт з Собакою" onclick="submitForm()">
            </label>
            <label>
               <input type="radio" name="capybara">
               <img src="./images/capybara.jpg" alt="Капібара" onclick="submitForm()">
            </label>
            <label>
               <input type="radio" name="ferret">
               <img src="./images/ferret.jpg" alt="Тхір" onclick="submitForm()">
            </label>
            <label>
               <input type="radio" name="kaban">
               <img src="./images/kaban.jpg" alt="Кабан" onclick="submitForm()">
            </label>
         </form>
      </div>
      <?php
      $catDog = $_POST["catDog"];
      $capybara = $_POST["capybara"];
      $ferret = $_POST["ferret"];
      $kaban = $_POST["kaban"];

      $correctAnswer = "catDog";
      switch ($selectedAnimal) {
         case "catDog":
         case "capybara":
         case "ferret":
         case "kaban":
            $resultMessage = ($selectedAnimal === $correctAnswer) ? "Правильно!" : "Неправильно. Ви вибрали {$selectedAnimal}.";
            break;
         default:
            $resultMessage = "Невірний вибір.";
      }
      echo "<p>{$resultMessage}</p>";
      ?>
      <div class="next_task">
         <a href="lab2.5.php">Завдання 5</a><br><br>
         <a href="/index.php">Головна</a>
      </div>
   </div>
   <script>
      // function submitForm() {
      //    document.getElementById("SubmitForm").submit();
      // }
      function submitForm(value) {
         document.querySelector('input[name="animal"]').value = value;
         document.getElementById("SubmitForm").submit();
      }
   </script>
</body>

</html>