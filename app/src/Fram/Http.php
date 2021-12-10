<?php

namespace App\Fram;

use JetBrains\PhpStorm\NoReturn;

class Http
{
    public static function redirect(string $url)
        {
            header("Location: $url");
            exit();
        }
}