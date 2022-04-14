<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";

$errors = [];

var_dump($_POST);

if ($_POST) {

    $postData = $_POST;

    foreach ($postData as $key => $postItem) {
        if ($key === 'name') {
            //name validacija
            if (!$postItem) {
                $errors['name'] = 'laukas yra tuščias';
            }
        }


        if ($key === 'sku') {
            //name validacija
            if (!$postItem) {
                $errors['sku'] = 'laukas yra tuščias';
            }
        }


        if ($key === 'price') {
            //name validacija
            if (!is_numeric($postItem)) {
                $errors['price'] = 'Turi būti numeris';
            }
        }

        if ($key === 'quantity') {
            //name validacija
            if (!is_numeric($postItem)) {
                $errors['quantity'] = 'Turi būti numeris';
            }
        }


    }


    var_dump($errors);

    if (count($errors) === 0) {
        $connection = \Application\Database\Connection::getInstance();
        $sql = "Insert into product(name, sku, description, price, quantity) VALUES (:name, :sku, :description, :price, :quantity)";
        $statement = $connection->prepare($sql);

        try {
            $statement->execute([
                'name' => $_POST['name'],
                'sku' => $_POST['sku'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
            ]);
        } catch (Throwable $exception) {
            echo('Įvyko klaida, patikrinkite duomenis');
        }

        header('Location: http://localhost/?success=1');
    }
}

require_once "views/add_product.php";