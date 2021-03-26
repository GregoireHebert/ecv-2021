<?php

declare(strict_types=1);

use App\Router;

$router = new Router();
$router->addRoute('/hello', 'App\Controller\Hello');
$router->addRoute('/faq', 'App\Controller\Faq');
