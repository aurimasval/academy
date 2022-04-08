<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "Model/Car.php";
require_once "Model/Student.php";
require_once "Model/User.php";
require_once "Service/PriceCalculator.php";

$calculator = new PriceCalculator();
$car1 = new Car();
$student = new Student();
$user = new User();
$car1->setName('mazda');

$price = $calculator->calculate($car1);

var_dump('autoload with require_once<br>');
var_dump('Price:' . $price);
