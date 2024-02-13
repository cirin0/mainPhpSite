<?php

//тут вкажіть свої дані:
$db_name	= 'your_db_name';
$db_host	= 'your_host';
$db_user	= 'your_db_user';
$db_pass	= 'your_password';


$db_server = mysqli_connect("$db_host", "$db_user", "$db_pass", "$db_name");
if (!$db_server) 
        die ("db.php: Error connect to db_server = $db_host, $db_user, $db_name <br>"); 

if ($db_server) {echo "db.php: good connect to db_server = $db_host, $db_user, $db_name <br>";}

#mysqli_query('SET NAMES utf8');

?>