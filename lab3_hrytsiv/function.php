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
