<?php
$title = "Лабораторна робота №6";
require '../components/header.php';
?>
<h2>Завдання 3</h2>
<?php
$htmlFragment = '<body>
                        <nav>Це меню</nav>
                        <h1>Це заголовок</h1>
                        <p>Це абзац</p>
                        <div>Це блок-елемент</div>
                     </body>';
$htmlNoTags = preg_replace('/<[^>]*>/', ' ', $htmlFragment);
$htmlCleaned = preg_replace('/\s+/', ' ', $htmlNoTags);
echo "Початковий фрагмент" . "<br>" . htmlentities($htmlFragment) . "<br>";
echo "<br>" . "Змінений фрагмент" . "<br>" . $htmlCleaned;
?>
<div class="next_task">
   <div>
      <a href="lab6.2.php">
         << Завдання 2 |</a>
            <a href="lab6.4.php">| Завдання 4 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>