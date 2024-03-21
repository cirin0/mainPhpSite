<?php
require '../components/header.php';
?>
<h2>Завдання 4</h2>
<div>
   <?php
   $file = fopen("./files/tag2.txt", "r");

   $tagCount = 0;
   echo "<table border='1'>";
   while (!feof($file)) {
      $tag = fgets($file);
      if (!empty($tag)) {
         $tagCount++;
      }
      $description = fgets($file);
      $tag = htmlspecialchars($tag);
      echo "<tr>";
      echo "<td>$tag</td>";
      echo "<td>$description</td>";
      echo "</tr>";
   }
   fclose($file);
   echo "</table>";
   $result = "Всього у файлі tag1.txt описано тегів: $tagCount";
   file_put_contents("./files/out.txt", $result);
   $outFile = fopen("./files/out.txt", "r");
   $outContent = fgets($outFile);
   echo "<br>";
   echo $outContent;
   ?>
</div>


<div class="next_task">
   <div>
      <a href="lab5.3.php">
         << Завдання 3 |</a>
            <a href="lab5.5.php">| Завдання 5 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>