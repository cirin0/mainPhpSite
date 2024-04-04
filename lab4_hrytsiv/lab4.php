<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 1</h2>
<?php
$kvadraty = [];
for ($i = 10; $i <= 20; $i++) {
   $kvadraty[] = $i * $i;
}

$kuby = [];
for ($j = 1; $j <= 10; $j++) {
   $kuby[] = $j * $j * $j;
}

$obednanyi_masyv = array_merge($kvadraty, $kuby);

foreach ($obednanyi_masyv as $element) {
   echo $element . " " . "<br>";
}
?>

<div class="next_task">
   <div>
      <a href="lab4.2.php">| Завдання 2 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>