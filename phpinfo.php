<?php phpinfo();
$LastModified_unix = strtotime(date("D, d M Y H:i:s", filemtime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
echo "Файл був змінений: $LastModified" . "<br>";
