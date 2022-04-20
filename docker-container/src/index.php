<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);


require_once "constants.php";

$host = DB_HOST;
$user = DB_USER;
$dbName = DB_DATABASE;
$password = DB_PASSWORD;
$dsn = "mysql:host={$host};dbName={$dbName}";

$conneciton = new PDO($dsn, $user, $password);

$conneciton->query("Select * from testavimas.testavimas_lenta");

echo phpinfo();