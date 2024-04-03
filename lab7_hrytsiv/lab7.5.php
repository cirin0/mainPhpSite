<?php
$title = "Лабораторна робота №7";
require '../components/header.php';
?>
<h2>Завдання 5</h2>
<?php
class MultiplicationTable
{
   private $number;

   public function __construct($number)
   {
      $this->number = $number;
   }

   public function generateTable()
   {
      echo "<h3>Таблиця множення для числа {$this->number}</h3>";
      echo "<table border='1'>";
      for ($i = 1; $i <= 10; $i++) {
         echo "<tr><td>{$this->number} * $i</td><td>=</td><td>" . ($this->number * $i) . "</td></tr>";
      }
      echo "</table>";
   }
}

$number1Table = new MultiplicationTable(3);
$number1Table->generateTable();

$number2Table = new MultiplicationTable(8);
$number2Table->generateTable();
?>

<div class="next_task">
   <div>
      <a href="lab7.4.php">
         << Завдання 4 |</a>
            <a href="lab7.6.php">| Завдання 6 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>