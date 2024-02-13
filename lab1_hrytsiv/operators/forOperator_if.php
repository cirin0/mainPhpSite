<?php
require("../../config.php");
//include_once("../db.php");
include_once("../function.php");
header("Content-Type: text/html; charset=" . $config{
   'charset'});
?>
<html>

<head>
</head>

<body>
   <?php
   $number = $_POST['value'];
   if ($number > 0) {
      echo "<div align=\"center\" style=\"font-size:120%;color:#FF9900;font-weight:bold;\">Число " . $number . " - додатнє</div>";
   } elseif ($number < 0) {
      echo "<div align=\"center\" style=\"font-size:120%;color:#FF9900;\">Число " . $number . " - від'ємне<div>";
   } else {
      echo "<div align=\"center\" style=\"font-size:120%;color:#FF9900;\">Число " . $number . " дорівнює нулю</div>";
   }
   ?>
   <h3 align="center"><a href="operator_if.php">Назад</a><br></h3>
</body>

</html>