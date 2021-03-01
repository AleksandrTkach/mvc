<?php

namespace App\core;

class Router
{
    protected $routes = [];
    protected $params = [];
    private $url;
    private $currentRoute;

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

                $urlParams = isset($this->params['replacement'])
                    ? array_filter(
                        explode('/', preg_replace($this->currentRoute, $this->params['replacement'], $this->url))
                    )
                    : [];

                if (method_exists($pathController, $actionName)) {
                    $controller = new $pathController($this->params);

                    count($urlParams)
                    ? call_user_func_array(array($controller, $actionName), $urlParams)
                    : $controller->$actionName();


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
            $regexRouteName = '/^' . str_replace(['/', ':id'], ['\/', '\d+'], $routeName) . '$/';
            $this->routes[$regexRouteName] = $params;
        }
    }

    /**
     * @return bool
     */
    private function issetRoute(): bool
    {
        $this->url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $this->url, $matches)) {
                $this->params = $params;
                $this->currentRoute = $route;
                return true;
            }
        }
        return false;
    }
}
