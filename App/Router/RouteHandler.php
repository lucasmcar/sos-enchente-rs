<?php

namespace App\Router;

class RouteHandler
{
    private $routes = [];

    public function addRoutes(string $name, string $route, string $controller, string $action)
    {
        $this->routes[$name] = [
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}