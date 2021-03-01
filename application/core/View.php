<?php

namespace App\core;

class View
{
    public array $route;
    public string $path;
    public string $layout = 'default';

    /**
     * View constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * @param $title
     * @param array $vars
     * @param null $path
     */
    public function render($title, $vars = [])
    {
        extract($vars);
        $pathView = 'application/views/' . $this->path . '.php';

        if (file_exists($pathView)) {
            ob_start();
            require $pathView;
            $content = ob_get_contents();
            ob_get_clean();

            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Not found view: ' . $this->path;
        }
    }

    /**
     * @param $errorCode
     */
    public static function error($errorCode)
    {
        http_response_code($errorCode);

        $path = 'application/views/errors/' . $errorCode . '.php';
        if (file_exists($path)) require $path;

        exit;
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        header('location: /' . $url);
        exit;
    }

    /**
     * @param $status
     * @param $message
     * @return false|string
     */
    public function response($status, $message)
    {
        return json_encode(compact('status', 'message'));
    }
}
