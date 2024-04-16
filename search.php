<?php
include_once 'db copy.php';
global $db_server;

// $db_name = 'if0_35935799_hrytsiv_db';
// $db_host = 'sql313.infinityfree.com';
// $db_user = 'if0_35935799';
// $db_pass = 'VK77DjHWEneB';

$db_name = 'hrytsivdb';
$db_host = '127.0.0.1';
$db_user = 'cirin';
$db_pass = 'Q20012004q';

$db_server = new mysqli("$db_host", "$db_user", "$db_pass", "$db_name");


if ($db_server->connect_error) {
   die("Connection failed: " . $db_server->connect_error);
}
$query = $_POST['query'];

$stmt = $db_server->prepare("SELECT content, title, url FROM pages WHERE title LIKE ? OR content LIKE ?");
$searchQuery = "%{$query}%";
$stmt->bind_param("ss", $searchQuery, $searchQuery);
$stmt->execute();
$result = $stmt->get_result();


$output = array();
while ($row = $result->fetch_assoc()) {
   $output[] = $row;
}

echo json_encode($output);

$stmt->close();
$db_server->close();
