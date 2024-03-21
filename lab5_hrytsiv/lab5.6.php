<?php
require '../components/header.php';
?>
<h2>Завдання 6</h2>
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
   echo "Кількість літер у останньому слові: $lastWordLetters <br>";
}
strManipulation($text);

?>
<div class="next_task">
   <div>
      <a href="lab5.5.php">
         << Завдання 5 |</a>
            <a href="lab5.7.php">| Завдання 7 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>