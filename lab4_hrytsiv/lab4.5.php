<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 5.1</h2>
<?php
$authors = [
   ['surname' => 'Жадан', 'name' => 'Сергій', 'Number of books' => 1],
   ['surname' => 'Андрухович', 'name' => 'Юрій', 'Number of books' => 2],
   ['surname' => 'Чех', 'name' => 'Артем', 'Number of books' => 9],
   ['surname' => 'Кокотюха', 'name' => 'Андрій', 'Number of books' => 5],
   ['surname' => 'Карпа', 'name' => 'Ірена', 'Number of books' => 4],
];

echo "<table border='1'>
<tr>
<th>Прізвище</th>
<th>Ім'я</th>
<th>Кількість книг</th>
</tr>";

$twoBooksAuthors = 0;

foreach ($authors as $author) {
   echo "<tr>";
   echo "<td>" . $author['surname'] . "</td>";
   echo "<td>" . $author['name'] . "</td>";
   echo "<td>" . $author['Number of books'] . "</td>";
   echo "</tr>";
   if ($author['Number of books'] > 2) {
      $twoBooksAuthors++;
   }
}
echo "</table>";
echo "<br>";
echo "<b>Кількість авторів, які опублікували більше двох книг: $twoBooksAuthors</b>";
?>


<h2>Завдання 5.2</h2>




<?php
$regions = [
   'Івано-Франківська' => [
      'city1' => ['name' => 'Коломия', 'population' => 70000],
      'city2' => ['name' => 'Івано-Франківськ', 'population' => 250000],
      'city3' => ['name' => 'Калуш', 'population' => 50000],
   ],
   'Львівська' => [
      'city1' => ['name' => 'Львів', 'population' => 750000],
      'city2' => ['name' => 'Дрогобич', 'population' => 80000],
      'city3' => ['name' => 'Самбір', 'population' => 45000],
   ],
   'Тернопільська' => [
      'city1' => ['name' => 'Тернопіль', 'population' => 300000],
      'city2' => ['name' => 'Чортків', 'population' => 60000],
      'city3' => ['name' => 'Бережани', 'population' => 40000],
   ],
];

echo '<table border="1">
<tr>
<th>Область</th>
<th>Місто</th>
<th>Населення, тис.</th>
</tr>';

$minPopulation = PHP_INT_MAX;
$minCity = '';

foreach ($regions as $regionName => $region) {
   $regionPopulation = 0;
   echo '<tr><td rowspan="3">' . $regionName . '</td>';

   foreach ($region as $city) {
      $regionPopulation += $city['population'];

      if ($city['population'] < $minPopulation) {
         $minPopulation = $city['population'];
         $minCity = $city['name'];
      }

      echo '<td>' . $city['name'] . '</td>';
      echo '<td>' . $city['population'] . '</td></tr><tr>';
   }

   echo '<td colspan="2"><strong>Загальне населення області:</strong> ' . $regionPopulation . '</td></tr>';
}

echo '</table>';

echo '<br>';
echo 'Місто з мінімальною кількістю мешканців: <span style="color: blue;"><b>' . $minCity . '</b></span>';
?>
<div class="next_task">
   <div>
      <a href="lab4.4.php">
         << Завдання 4 |</a>
            <a href="lab4.6.php">| Завдання 6 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>