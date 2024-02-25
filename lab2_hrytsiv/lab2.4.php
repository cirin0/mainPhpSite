<?php
session_start();
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
   <?php
   $availableImages = [
      "capybara" => "Капібари",
      "catDog" => "Кота з Собакою",
      "ferret" => "Тхора",
      "сhinchilla" => "Шиншили",
   ];
   $titleAnimals = array_keys($availableImages);
   $randomImg = array_rand($titleAnimals, 4);
   shuffle($randomImg);
   ?>
   <div class="wrapper">
      <h3>
         <?php
         $randomTitle = $titleAnimals[array_rand($titleAnimals)];
         $titleAnimal = $availableImages[$randomTitle];
         echo "Виберіть, будь ласка, зображення {$titleAnimal}";
         ?>
      </h3>
      <div class="form_container">
         <form method="post">
            <div class="animal_container">
               <?php
               foreach ($randomImg as $index) {
                  $imageName = $titleAnimals[$index];
                  $imageDescription = $availableImages[$imageName];
                  echo "<input type='radio' name='animal' id='$imageName' value='$imageName'>";
                  echo "<label for='$imageName'><img src='./images/$imageName.jpg' alt='$imageDescription'></label>";
                  unset($availableImages[$imageName]);
               }
               ?>
            </div>
            <button type="submit">Перевірити відповідь</button>
         </form>
      </div>
      <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
         if (isset($_POST["animal"])) {
            $selectedAnimal = $_POST["animal"];
            $correctAnimal = $_SESSION['title'];
            $selectedAnimalName = $availableImages[$selectedAnimal];
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
            if ($selectedAnimal === $correctAnimal) {
               echo "<p>Правильно! Ви вибрали {$selectedAnimalName}.<p>";
               echo "<label><img style= \"width: 300px;\" src=\"./images/catDog.jpg\"></label>";
            } else {
               echo "<p>Неправильно. Ви вибрали {$selectedAnimalName}.<p>";
               echo "<label><img style= \"width: 300px;\" src='./images/{$selectedAnimal}.jpg'></label>";
            }
         } else {
            echo "<p>Будь ласка, зробіть вибір.</p>";
         };
         $_SESSION['title'] = $randomTitle;
      }
      ?>
      <div class="next_task">
         <div>
            <a href="lab2.3.php">
               << Завдання 3 |</a>
                  <a href="lab2.5.php">| Завдання 5 >></a>
         </div>
         <a href="/index.php">Головна</a>
      </div>
   </div>
</body>

</html>