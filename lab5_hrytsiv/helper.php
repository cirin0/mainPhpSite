<?php
setlocale(LC_ALL, 'Ukrainian');
function displayWordsAlphabetically($filename)
{
   $text = file_get_contents($filename);
   $words = explode(' ', $text);
   sort($words, SORT_LOCALE_STRING);

   foreach ($words as $word) {
      echo $word . "<br>";
   }
}

function displayMostFrequentWords($filename)
{
   $text = file_get_contents($filename);
   $words = explode(' ', $text);
   $wordCounts = array_count_values($words);
   arsort($wordCounts);
   $topWords = array_slice($wordCounts, 0, 2, true);

   foreach ($topWords as $word => $count) {
      echo "$word - $count рази" . "<br>";
   }
}

function displayLongestWord($filename)
{
   $text = file_get_contents($filename);
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

function displayShortestWord($filename)
{
   $text = file_get_contents($filename);
   $words = explode(' ', $text);
   $minLength = PHP_INT_MAX;
   $shortestWords = [];

   foreach ($words as $word) {
      $wordLength = mb_strlen($word, 'UTF-8');
      if ($wordLength > 1 && $word != 32) {
         if ($wordLength < $minLength) {
            $minLength = $wordLength;
            $shortestWords = [$word];
         } elseif ($wordLength == $minLength) {
            $shortestWords[] = $word;
         }
      }
   }
   echo "Найкоротші слова (и): " . implode(', ', $shortestWords) . "<br>";
   echo "Довжина: $minLength" . "<br>";
}

function findWordsStartingWithI($filename)
{
   $text = file_get_contents($filename);
   $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
   $iWords = [];

   foreach ($words as $word) {
      if (mb_substr($word, 0, 1, 'UTF-8') === 'і' || mb_substr($word, 0, 1, 'UTF-8') === 'І') {
         $iWords[] = $word;
      }
   }

   echo "Слова, починаючи з 'i': " . implode(', ', $iWords) . "<br>";
}

function replaceSmallOsWithBigOs($filename)
{
   $text = file_get_contents($filename);
   $words = explode(" ", $text);

   foreach ($words as $word) {
      if (strpos($word, 'о') !== false) {
         $replacedWord = str_replace('о', 'О', $word);
         echo $replacedWord . "<br>";
      }
   }
}

function randParagraph($filename)
{
   $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   $randIndex = rand(0, count($lines) - 1);
   echo $lines[$randIndex];
}
