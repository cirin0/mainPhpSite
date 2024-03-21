<?php
require '../components/header.php';
?>
<h2>Завдання 3</h2>
<div>
   <?php
   $file = fopen("./files/tag1.txt", "r");
   echo "<table border='1'>";
   while (!feof($file)) {
      $tag = fgets($file);
      $description = fgets($file);
      $tag = "<$tag>";
      $tag = htmlspecialchars($tag);
      echo "<tr>";
      echo "<td>$tag</td>";
      echo "<td>$description</td>";
      echo "</tr>";
   }
   fclose($file);
   echo "</table>";
   ?>
</div>


<div class="next_task">
   <div>
      <a href="lab5.2.php">
         << Завдання 2 |</a>
            <a href="lab5.4.php">| Завдання 4 >></a>
   </div>
   <a href="/index.php">Головна</a>
</div>
<?php
require '../components/footer.php';
?>