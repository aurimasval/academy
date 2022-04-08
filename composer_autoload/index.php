<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";

$calculator = new \Testing\Service\PriceCalculator();
$car1 = new \Testing\Model\Car();
$student = new \Testing\Model\Student();
$user = new \Testing\Model\User();
$test = new \Tests\Testavimas();
$car1->setName('mazda');

$price = $calculator->calculate($car1);

var_dump('autoload with composer<br>');
var_dump('Price:' . $price);




/// Guzzle pavyzdys:
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'