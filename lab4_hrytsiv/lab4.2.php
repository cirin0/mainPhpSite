<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 2</h2>
<h4>Використання циклу foreach</h4>
<br>
<?php
$names["Бойчук"] = "Іван";
$names["Мельник"] = "Борис";
$names["Швець"] = "Антон";

foreach ($names as $key => $value) {
   echo "<b>$value $key</b><br>";
}
?>
<div class="next_task">
   <div>
      <a href="lab4.php">
         << Завдання 1 |</a>
            <a href="lab4.3.php">| Завдання 3 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>