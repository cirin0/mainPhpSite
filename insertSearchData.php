<?php
include_once 'db.php';
$db_server->set_charset("utf8");


$sqlInsert = "
INSERT INTO `pages` (`title`, `content`, `url`) VALUES
('Завдання 1', 'Лабораторна робота 10', 'https://hrytsivphp.kesug.com/lab10_hrytsiv/lab10.php'),
('Завдання 5', 'Лабораторна робота 10', 'https://hrytsivphp.kesug.com/lab10_hrytsiv/lab10.5.php'),
('Завдання 6', 'Лабораторна робота 10', 'https://hrytsivphp.kesug.com/lab10_hrytsiv/lab10.6.php')
";

// if ($db_server->query($sqlInsert) === TRUE) {
//    echo "New record created successfully";
// } else {
//    echo "Error: " . $sqlInsert . "<br>" . $db_server->error;
// }

$db_server->close();
