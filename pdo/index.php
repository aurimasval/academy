<?php

require_once "constants.php";

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";

//Create PDO instance
$connection = \Application\Database\Connection::getInstance();

//set default fetch mode
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// query method
//$statement = $connection->query('SELECT * FROM academy.product WHERE LIMIT 10');

var_dump($_GET);

$query = "SELECT * FROM product WHERE 1=1 ";
$arguments = [];

if (isset($_GET['name']) && $_GET['name']) {
    $query .= " AND name LIKE :name ";
    $arguments['name'] = '%' . $_GET['name'] . '%';
}

if (isset($_GET['active']) && $_GET['active']) {
    $query .= " AND status = 1 ";
}

if (isset($_GET['sort']) && $_GET['sort']) {
    switch ($_GET['sort']) {
        case 'price_asc':
            $query .= " ORDER BY price ASC ";
            break;
        case 'price_desc':
            $query .= " ORDER BY price DESC ";
            break;
        case 'status_desc':
            $query .= " ORDER BY status DESC ";
            break;
        case 'status_asc':
            $query .= " ORDER BY status ASC ";
            break;
    }
}

var_dump($query);

$statement = $connection->prepare($query);
$statement->execute($arguments);
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//gauti kiek buvo parduotas
#Select SUM(quantity) from order_product op  WHERE product_id = 2

foreach ($products as &$product) {
    $productId = $product['id'];
    $query = "Select SUM(quantity) from order_product op WHERE product_id = :productId";
    $statement = $connection->prepare($query);
    $statement->execute(['productId' => $productId]);
    $count = $statement->fetchColumn();
    $product['count'] = $count ?: 0;
}

//
// SQL INJECTION EXAMPLE
//if (isset($_GET['name']) && $_GET['name']) {
//
//    $query = "DELETE FROM academy.product WHERE id = " . $_GET['name'];
//
//    $connection->exec($query);
//}

include_once "views/products.php";
