<?php

namespace Application\Database;

use PDO;
use PDOException;

class Connection
{
    protected static ?PDO $instance = null;

    private function __construct() {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $dbName = DB_DATABASE;
            $password = DB_PASSWORD;
            $dsn = "mysql:host={$host};dbName={$dbName}";
            self::$instance = new PDO($dsn, $user, $password);
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