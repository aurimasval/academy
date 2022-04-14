<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";

if ($_POST) {
    if (isset($_POST['id']) && $_POST['id']) {
        try {
            $connection = \Application\Database\Connection::getInstance();
            $sql = "DELETE from product WHERE id = :id";
            $statement = $connection->prepare($sql);
            $statement->execute([
                'id' => $_POST['id']
            ]);

            header('Location: http://localhost/?deleted=1');
        } catch (Throwable $exception) {
            //log
        }
    }
} else {
    echo "Įvyko klaida";
}

