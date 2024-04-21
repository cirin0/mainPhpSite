<?php
include_once 'db.php';
$db_server->set_charset("utf8");


$sqlInsert = "
INSERT INTO `pages` (`title`, `content`, `url`) VALUES
('Завдання 1-2', 'Лабораторна робота 9', 'https://hrytsivphp.kesug.com/lab9_hrytsiv/lab9.php?'),
('Завдання 3', 'Лабораторна робота 9', 'https://hrytsivphp.kesug.com/lab9_hrytsiv/lab9.3.php'),
('Завдання 4', 'Лабораторна робота 9', 'https://hrytsivphp.kesug.com/lab9_hrytsiv/lab9.4.php'),
('Завдання 5', 'Лабораторна робота 9', 'https://hrytsivphp.kesug.com/lab9_hrytsiv/lab9.5.php'),
('Завдання 6', 'Лабораторна робота 9', 'https://hrytsivphp.kesug.com/lab9_hrytsiv/lab9.6.php')
";


// mysqli_query($db_server, $sqlInsert);

$db_server->close();
