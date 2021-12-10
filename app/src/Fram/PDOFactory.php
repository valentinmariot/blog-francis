<?php

namespace App\Fram;

use PDO;

class PDOFactory
{
    private static string $db = 'mysql:host=db;dbname=blogmvc;charset=utf8';
    private static string $username = 'root';
    private static string $password = 'password';

    public static function getPdo(): \PDO
        {
            return new PDO(self::$db, self::$username, self::$password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
}




