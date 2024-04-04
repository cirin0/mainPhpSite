<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 4</h2>
<?php
$countries = [
   "Ukraine" => ["name" => "Україна", "capital" => "Київ", "popul" => 38],
   "Germany" => ["name" => "Німеччина", "capital" => "Берлін", "popul" => 84],
   "Poland" => ["name" => "Польща", "capital" => "Варшава", "popul" => 37],
];

echo "<table border='1'>
<tr>
<th>Назва</th>
<th>Столиця</th>
<th>Населення, млн.</th>
</tr>";
foreach ($countries as $country) {
   echo "<tr>";
   echo "<td>" . $country['name'] . "</td>";
   echo "<td>" . $country['capital'] . "</td>";
   echo "<td>" . $country['popul'] . "</td>";
   echo "</tr>";
}
echo "</table>";

echo "<br>";

foreach ($countries as $key => $value) {
   echo "Столиця " . $value['name'] . " — " . $value['capital'] . ", населення — " . $value['popul'] . " млн.;<br>";
}

echo "<br>";

ksort($countries);
foreach ($countries as $key => $value) {
   ksort($value);
   foreach ($value as $k => $v) {
   }
}
echo "<h3>Відсортовані за назвою країни:</h3><br>";
echo "<div class = 'null'>";
echo "<pre>";
print_r($countries);
echo "</pre>";
echo "</div>";
?>


<div class="next_task">
   <div>
      <a href="lab4.3.php">
         << Завдання 3 |</a>
            <a href="lab4.5.php">| Завдання 5 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>