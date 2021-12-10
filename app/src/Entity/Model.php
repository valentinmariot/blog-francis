<?php

namespace App\Entity;

use App\Fram\PDOFactory;

abstract class Model
{
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPdo();
    }
}