<?php
require 'config.php';
?>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/style.css" rel="stylesheet">
<title>My PHP</title>

<body>
   <div class="wrapper">
      <div class="form_container form_main">
         <form action="lab1_hrytsiv/lab1.php">
            <table border=0>
               <tr>
                  <td>Login:</td>
                  <td><input type='text' name='ULogin'></td>
               <tr>
               <tr>
                  <td>Пароль:</td>
                  <td><input type='password' name='Passw'></td>
               <tr>
               <tr>
                  <td><input type='submit' value='Відправити' name='Send'></td>
                  <!-- <td>&nbsp</td> -->
                  </td>
               </tr>
            </table>
         </form>
      </div>
      <?php
      $zm = 10;
      echo "<h1>Програмування мовою PHP</h1>
      <h2>Перелік лабораторних робіт Гриціва Івана</h2>
      <h3>Варіант №4</h3>
      <div class=list>
      <a href=lab1_hrytsiv/lab1.php?zm=$zm>lab1.php</a>
      <a href=lab2_hrytsiv/lab2.php?>lab2.php</a>
      <a href=lab3_hrytsiv/lab3.php?zm=" . $zm . ">lab3.php</a>
      <a href=labJS_hrytsiv/labJS.php>PHP+JS</a>
      <a href=labDB_hrytsiv/labDB.php>PHP+DB</a>";
      echo "</div>";
      echo "zm=$zm <br>";
      echo "Zm=$Zm <br>";
      echo 'zm=$zm <br>';
      echo '</div>';
      ?>
</body>


</html>