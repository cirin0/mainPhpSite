<?php
$db_name = 'pet_store';
$db_host = '127.0.0.1';
$db_user = 'cirin';
$db_pass = 'Q20012004q';

$db_server = new mysqli("$db_host", "$db_user", "$db_pass", "$db_name");
// if (!$db_server)
//    die("db.php: Error connect to db_server = $db_host, $db_user, $db_name" . "<br>" . "<br>");

// if ($db_server) {
//    echo "db.php: good connect to db_server = $db_host, $db_user, $db_name" . "<br>" . "<br>";
// }
