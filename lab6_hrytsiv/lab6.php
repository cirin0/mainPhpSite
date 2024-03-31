<?php
$title = "Лабораторна робота №6";
require '../components/header.php';
?>
<h2>Завдання 1</h2>
<div style="width: 50%;">
   <h4>Завдання 1.1</h4><br>
   <?php
   $text = "text.txt";
   $textOutp = file_get_contents($text);
   echo htmlspecialchars($textOutp);
   ?>
</div>
<br>
<div>
   <h4>Завдання 1.2</h4><br>
   <?php
   preg_match_all('/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*>/', $textOutp, $matches);
   $tags = $matches[1];
   foreach ($tags as $tag) {
      echo $tag . "<br>";
   }
   ?>
</div>
<br>
<div>
   <h4>Завдання 1.3</h4><br>
   <?php
   preg_match_all('/<([a-zA-Z][a-zA-Z0-9]*)\b[^>]*>/', $textOutp, $matches);
   $tags = $matches[0];
   foreach ($tags as $tag) {
      echo htmlspecialchars($tag) . "<br>";
   }
   ?>
</div>

<div class="next_task">
   <div>
      <a href="lab6.2.php">| Завдання 2 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>