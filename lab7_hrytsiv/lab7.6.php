<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 6</h2>
<?php
class Country
{
   public $name;
   public $population;
   public $capital;

   public function __construct($name, $population, $capital)
   {
      $this->name = $name;
      $this->population = $population;
      $this->capital = $capital;
   }
}

$countries = array(
   new Country('Hungary', 9700000, 'Budapest'),
   new Country('Honduras', 10000000, 'Tegucigalpa'),
   new Country('Haiti', 11000000, 'Port-au-Prince'),
);

echo "<table border='1'>";
foreach ($countries as $country) {
   echo "<tr><td><b>Назва країни</b></td><td><b>{$country->name}</b></td></tr>";
   echo "<tr><td>Населення</td><td>{$country->population}</td></tr>";
   echo "<tr><td>Столиця</td><td>{$country->capital}</td></tr>";
}
echo "</table>";
?>

<div class="next_task">
   <div>
      <a href="lab7.5.php">
         << Завдання 5 |</a>
            <a href="lab7.7.php">| Завдання 7 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>