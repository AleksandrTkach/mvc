<?php

require 'application/lib/Dev.php';

use App\core\Router;

require __DIR__ . '/vendor/autoload.php';

session_start();

$router = new Router;
$router();
