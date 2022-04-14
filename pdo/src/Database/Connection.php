<?php

namespace Application\Database;

use PDO;
use PDOException;

class Connection
{
    protected static ?PDO $instance = null;

    private function __construct() {

        require_once "constants.php";

        try {
            $host = DB_HOST;
            $user = DB_USER;
            $dbName = DB_DATABASE;
            $password = DB_PASSWORD;
            $dsn = "mysql:host={$host};dbName={$dbName}";
            self::$instance = new PDO($dsn, $user, $password);
            self::$instance->exec("Use {$dbName};");
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            die("MySql Connection Error: " . $e->getMessage());
        }
    }

    public static function getInstance(): PDO {
        if (!self::$instance) {
            new Connection();
        }

        return self::$instance;
    }
}
