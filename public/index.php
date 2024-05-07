<?php

require '../vendor/autoload.php';

session_start();
date_default_timezone_set('America/Sao_Paulo');

use App\Router\Route;
use App\Utils\DotEnvUtil;


$path = dirname(__FILE__, 2);

DotEnvUtil::loadEnv($path."/.env");

$route = new Route();