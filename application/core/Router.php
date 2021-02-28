<?php

namespace App\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $allowedRoutes = require 'application/config/routes.php';
        $this->setRouters($allowedRoutes);
    }

    public function __invoke()
    {
        if ($this->issetRoute()) {
            $pathController = 'App\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($pathController)) {
                $actionName = $this->params['action'] . 'Action';

                if (method_exists($pathController, $actionName)) {
                    $controller = new $pathController($this->params);
                    $controller->$actionName();
                } else {
                    View::error(404);
                }
            } else {
                View::error(404);
            }
        } else {
            View::error(404);
        }
    }

    /**
     * @param $allowedRoutes
     */
    private function setRouters($allowedRoutes)
    {
        foreach ($allowedRoutes as $routeName => $params) {
            $routeName = str_replace('/', '\/', $routeName);
            $regexRouteName = '/^' . $routeName . '$/';
            $this->routes[$regexRouteName] = $params;
        }
    }

    /**
     * @return bool
     */
    private function issetRoute(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
//            debug($route);
//            debug($url);
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}
