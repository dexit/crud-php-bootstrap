<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "u384366275_3dev";

$db = mysql_connect($host, $user, $password) or die("Could not connect to database");

mysql_select_db($database, $db);

?>
