<?php
require '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <link href="./css/style.css" rel="stylesheet">
   <title>Лабораторна робота №2</title>
</head>

<body>
   <div class="wrapper">
      <h3>Виберіть, будь ласка, зображення кота разом з собакою</h3>
      <div class="form_container">
         <form method="post">
            <div class="animal_container">
               <input type="radio" name="animal" id="catDog" value="catDog">
               <label for="catDog"><img src="./images/cat-with-dog.jpg" alt="Кіт з Собакою"></label>
               <input type="radio" name="animal" id="capybara" value="capybara">
               <label for="capybara"><img src="./images/capybara.jpg" alt="Капібара"></label>
               <input type="radio" name="animal" id="ferret" value="ferret">
               <label for="ferret"><img src="./images/ferret.jpg" alt="Тхір"></label>
               <input type="radio" name="animal" id="сhinchilla" value="сhinchilla">
               <label for="сhinchilla"><img src="./images/сhinchilla.jpg" alt="Шиншила"></label>
            </div>
            <button type="submit">Перевірити відповідь</button>
         </form>
      </div>
      <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
         if (isset($_POST["animal"])) {
            $selectedAnimal = $_POST["animal"];
            $correctAnswer = "catDog";
            switch ($selectedAnimal) {
               case "catDog":
                  $selectedAnimalName = "Кота з Собакою";
                  break;
               case "capybara":
                  $selectedAnimalName = "Капібару";
                  break;
               case "ferret":
                  $selectedAnimalName = "Тхора";
                  break;
               case "сhinchilla":
                  $selectedAnimalName = "Шинлилу";
                  break;
               default:
                  $selectedAnimalName = "";
            }
            if ($selectedAnimal === $correctAnswer) {
               echo "<p>Правильно! Ви вибрали {$selectedAnimalName}.<p>";
               echo "<label><img style= \"width: 300px;\" src=\"./images/cat-with-dog.jpg\"></label>";
            } else {
               echo "<label><img style= \"width: 300px;\" src='./images/{$selectedAnimal}.jpg'></label>";
               echo "<p>Неправильно. Ви вибрали {$selectedAnimalName}.<p>";
            }
         } else {
            echo "<p>Будь ласка, зробіть вибір.</p>";
         }
      }
      ?>
      <div class="next_task">
         <a href="lab2.5.php">Завдання 5</a><br><br>
         <a href="/index.php">Головна</a>
      </div>
   </div>
</body>

</html>