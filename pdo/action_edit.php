<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";


$errors = [];

//gauti info pagal id is duomenu bazes
//atvaizduoti forma
//pasaugoti informacija

if ($_POST) {
    $product = $_POST;

    foreach ($product as $key => $postItem) {
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

    if (count($errors) === 0) {
        //updatinti
        try {
            $connection = \Application\Database\Connection::getInstance();
            $sql = "UPDATE product SET 
                   price = :price,
                   name = :name,
                   quantity = :quantity,
                   sku = :sku,
                   description = :description
                WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->execute([
                'price' => $_POST['price'],
                'name' => $_POST['name'],
                'quantity' => $_POST['quantity'],
                'sku' => $_POST['sku'],
                'description' => $_POST['description'],
                'id' => $_GET['id'],
            ]);
        } catch (Throwable $exception) {
            var_dump($exception->getMessage());
            die();
        }

        header('Location: http://localhost/action_edit.php?updated=1&id=' . $_GET['id']);
    } else {
        require_once "views/edit_product.php";
    }
} elseif (isset($_GET['id']) && $_GET['id']) {

    $connection = \Application\Database\Connection::getInstance();
    $sql = "Select * from product WHERE id = :id";
    $statement = $connection->prepare($sql);

    $statement->execute([
        'id' => $_GET['id']
    ]);

    $product = $statement->fetch();

    require_once "views/edit_product.php";
} else {
    echo "Įvyko klaida";
}
