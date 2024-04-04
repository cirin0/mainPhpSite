<?php
$title = "Лабораторна робота №4";
require '../components/header.php';
?>
<h2>Завдання 3</h2>
<?php
$my_topic = array(
   2 => "Собака",
   3 => "Кішка",
   4 => "Тхір",
   5 => "Шинлила"
);
echo "<b>Оригінальний масив</b><br>";

foreach ($my_topic as $index => $value) {
   echo "Індекс: $index, Елемент: $value<br>";
}

echo "<br>";

$my_topic_flipped = array_flip($my_topic);

echo "<b>Обернений масив</b> <br>";

foreach ($my_topic_flipped as $index => $value) {
   echo "Індекс: $index, Елемент: $value<br>";
}
?>
<div class="next_task">
   <div>
      <a href="lab4.3.php">
         << Завдання 3 |</a>
            <a href="lab4.4.php">| Завдання 4 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>