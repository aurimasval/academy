<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    echo $class;
    include dirname(__FILE__) . '/' . str_replace('\\', '/', $class) . '.php';
});

$calculator = new \Service\PriceCalculator();
$car1 = new \Model\Car();
$student = new \Model\Student();
$user = new \Model\User();
$car1->setName('mazda');

$price = $calculator->calculate($car1);

var_dump('autoload with spl_autoload_register<br>');
var_dump('Price:' . $price);
