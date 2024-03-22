<?php
global $text5, $text6;
require '../components/header.php';
require 'helper.php';
?>
<h2>Завдання 6</h2>
<h4>Текст 4</h4>
<?php
$text = "./files/hrytsiv_text.txt";
function strManipulation($filename)
{
   $text = file_get_contents($filename);
   $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
   $wordCount = count($words);
   $firstWordLetters = mb_strlen($words[0]);
   $lastWordLetters = mb_strlen(end($words));
   echo "Кількість слів у тексті: $wordCount <br>";
   echo "Кількість літер у першому слові: $firstWordLetters <br>";
   echo "Кількість літер в останньому слові: $lastWordLetters <br>";
}

strManipulation($text);
?>
<br>
<h4>Текст 5</h4>
<?php
function displayLongestWord6($text)
{
   $words = explode(' ', $text);
   $maxLength = 0;
   $longestWords = [];

   foreach ($words as $word) {
      $wordLength = mb_strlen($word, 'UTF-8');
      if ($wordLength > $maxLength) {
         $maxLength = $wordLength;
         $longestWords = [$word];
      } elseif ($wordLength == $maxLength) {
         $longestWords[] = $word;
      }
   }
   echo "Найдовше слово (и): " . implode(', ', $longestWords) . "<br>";
   echo "Довжина: $maxLength" . "<br>";
}

displayLongestWord6($text5);
?>
<br>
<h4>Текст 6</h4>
<?php
function countWorld($text)
{
   $words = explode(' ', $text);
   $wordCounts = array_count_values($words);
   foreach ($wordCounts as $word => $count) {
      echo "$word: $count<br>";
   }
}
countWorld($text6);
?>
<div class="next_task">
   <div>
      <a href="lab5.5.php">
         << Завдання 5</a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>