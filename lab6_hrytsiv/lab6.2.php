<?php
$title = "Лабораторна робота №6";
require '../components/header.php';
?>
<h2>Завдання 2</h2>
<?php
// Зчитуємо вміст файлу text.txt
$text = "text.txt";
$textOutp = file_get_contents($text);

// Створюємо регулярний вираз для пошуку входжень слова "тег" або "HTML"
$pattern = '/[^.!?]*\b(?:тег|HTML)\b[^.!?]*[.!?]/iu';
// Знаходимо всі входження за допомогою preg_match_all
preg_match_all($pattern, $textOutp, $matches);

// Виводимо знайдені речення
foreach ($matches[0] as $sentence) {
   // Виділяємо слова жирним шрифтом
   $sentenceHighlighted = preg_replace('/\b(?:тег|HTML)\b/iu', '<strong>$0</strong>',  htmlspecialchars($sentence));
   echo $sentenceHighlighted . "<br>";
}
?>

<div class="next_task">
   <div>
      <a href="lab6.php">
         << Завдання 1 |</a>
            <a href="lab6.3.php">| Завдання 3 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>