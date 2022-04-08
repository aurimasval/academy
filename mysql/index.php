<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

include_once "constants.php";

//Procedurinis vykdymas

$mysqli = mysqli_connect(dbHost, "root", "", "academy_test");
$result = mysqli_query($mysqli, "SELECT * from vartotojai as v WHERE v.country  = 'GB';");
$row = mysqli_fetch_assoc($result);

mysqli_close($mysqli);
var_dump($row);



//Objektinis vykdymas

$mysqli = new mysqli(dbHost, "root", "", "academy_test");

$result = $mysqli->query("SELECT * from vartotojai as v WHERE v.country  = 'GB';");
$row = $result->fetch_assoc();

echo "<br>";
var_dump($row);



//SQL injection pavyzdys su prepare

$data = "GB OR 1=1";
$stmt = $mysqli->prepare("SELECT * from vartotojai as v WHERE v.country = ? ");
$stmt->bind_param("s", $data);

$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$mysqli->close();

echo "<br>";
var_dump($row);


