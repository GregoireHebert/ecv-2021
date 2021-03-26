<?php

declare(strict_types=1);

require_once ('config/autoload.php');
require_once ('config/Routes.php');

try {
    $controller = $router->getController($_SERVER['PATH_INFO'] ?? '/');
    $controller();
} catch (Exception $exception) {
    echo '404';
}
