<?php

declare(strict_types=1);

namespace App;

class Router
{
    private $routes = [];
    public function addRoute($path, $controller) {
        $this->routes[$path] = function () use ($controller) {
            return new $controller();
        };
    }

    public function getController($path) {
        if (null === $controller = $this->routes[$path] ?? null) {
            throw new \Exception('Controller does not exists');
        }

        return $controller();
    }
}
