<?php
function create_table2($data, $border = 1, $cellpadding = 4, $cellspacing = 4)
{
   echo "<h4> Результат виклику функції create_table2: </h4> border=$border";
   echo "<table border=$border  cellpadding=$cellpadding cellspacing=$cellspacing>\n";
   reset($data); //    встановлює покажчик масиву на його початок
   $value = current($data); //current повертає поточний елемент масиву
   while ($value) {
      echo "<tr><td>$value</td></tr>\n";
      $value = next($data);
      //next - переміщують показник на елемент вперед на один елемент; 
      //next – спочатку змінює покажчик, потім – повертає значення, each–навпаки;
   }
   echo '</table>';
   echo "<div>Кількість параметрів:" . func_num_args() . "<br />";
   //Функція func_num_args() визначає, скільки аргументів було передано функції користувача
   $args = func_get_args();
   //func_get_args() повертає масив, який містить ці аргументи
   foreach ($args as $arg)
      echo $arg . "<br/>";
   echo "</div>";
}

function fibonacci($n)
{
   if ($n <= 1) {
      return $n;
   } else {
      return fibonacci($n - 1) + fibonacci($n - 2);
   }
}

function printArray($array)
{
   echo "<h3>В звичайному порядку</h3>";
   for ($i = 0; $i < count($array); $i++) {
      echo "Індекс: $i, значення: $array[$i]<br />";
   }
   echo "<h3>В зворотному порядку:</h3>";
   for ($i = count($array) - 1; $i >= 0; $i--) {
      echo "Індекс: $i, значення: $array[$i]<br />";
   }
}

function generateArray($a)
{
   $N = ($a % 10 + 1) * 2;
   $array = array();
   for ($i = 0; $i < $N; $i++) {
      for ($j = 0; $j < $N; $j++) {
         $array[$i][$j] = rand(1, 100);
      }
   }
   return $array;
}

function printArrayAndMinAndLast($array)
{
   $minValues = array();
   $lastColumn = array();
   echo "| ";
   for ($i = 0; $i < count($array); $i++) {
      echo implode(' | ', $array[$i]) . " |\n";
      $minValues[] = min($array[$i]);
      $lastColumn[] = end($array[$i]);
   }
   echo "Мінімальні значення рядків: " . implode(' ', $minValues) . "\n";
   echo "Останній стовпець: " . implode(' ', $lastColumn) . "\n";
}
