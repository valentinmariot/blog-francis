<?php
session_start();

require ('../vendor/autoload.php');

App\Fram\Router::getController();
