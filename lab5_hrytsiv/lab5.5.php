<?php
require '../components/header.php';
require 'helper.php';
?>
<h2>Завдання 5</h2>
<div>
   <h4>5.1 Функція, що виводить слова у алфавітному порядку</h4>
   <?php
   $text = "./files/hrytsiv_text.txt";
   displayWordsAlphabetically($text);
   ?>
</div>
<br>
<div>
   <h4>5.2. Вивести список двох слів, які найчастіше зустрічаються у тексті.</h4>
   <?php
   displayMostFrequentWords($text);
   ?>
</div>
<br>
<div>
   <h4>5.3.Вивести найдовше слово тексту і його довжину</h4>
   <?php
   displayLongestWord($text);
   ?>
</div>
<br>
<div>
   <h4>5.4.Вивести найкоротше слово тексту і його довжину</h4>
   <?php
   displayShortestWord($text);
   ?>
</div>
<br>
<div>
   <h4>5.5.Знайти в тексті всі слова, які починаються на першу "і"</h4>
   <?php
   findWordsStartingWithI($text);
   ?>
</div>
<br>
<div>
   <h4>5.6.Замінені всі малі літери “о” на великі “О”;</h4>
   <?php
   replaceSmallOsWithBigOs($text);
   ?>
</div>
<br>
<div style="max-width: 50%;">
   <h4>5.7.Випадковий абзац</h4>
   <?php
   $textAll = "./files/hrytsiv_text_all.txt";
   randParagraph($textAll);
   ?>
</div>
<br>
<div class="next_task">
   <div>
      <a href="lab5.4.php">
         << Завдання 4|</a>
            <a href="lab5.6.php">| Завдання6 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>