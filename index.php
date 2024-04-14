<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="/css/style.css" rel="stylesheet">
   <link rel="shortcut icon" type="image/x-icon" href="./favico.ico">
   <title>My PHP</title>
</head>

<body>
   <?php
   require 'config.php';
   ?>
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
                  <td>
                     <input type='submit' value='Відправити' name='Send'>
                  </td>
                  <!-- <td>&nbsp</td> -->
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
      <a href=lab4_hrytsiv/lab4.php>lab4.php</a>
      <a href=lab5_hrytsiv/lab5.php>lab5.php</a>
      <a href=lab6_hrytsiv/lab6.php>lab6.php</a>
      <a href=lab7_hrytsiv/lab7.php>lab7.php</a>
      <a href=lab8_DB/lab8.1-3.php>PHP+Lab8DB</a>
      <a href=labJS_hrytsiv/labJS.php>PHP+JS</a>";
      echo "</div>";
      echo "zm=$zm <br>";
      echo "Zm=$Zm <br>";
      echo 'zm=$zm <br>';
      echo '</div>';
      ?>
</body>


</html>