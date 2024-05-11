<?php
$db_name = 'pet_store';
$db_host = '127.0.0.1';
$db_user = 'cirin';
$db_pass = 'Q20012004q';

$db_server = new mysqli("$db_host", "$db_user", "$db_pass", "$db_name");
$db_server->set_charset("utf8");
