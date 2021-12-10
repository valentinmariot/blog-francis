<?php

namespace App\Fram;

class Http
{
    public static function redirect(string $url)
        {
            header("Location: $url");
            exit();
        }

    public function connection()
    {
        session_start();

    }


    public function unconnection()
    {
        session_destroy();
    }
}