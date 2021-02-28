<?php

namespace App\core;

class Controller
{
    public array $route;
    public object $view;
    public $model;

    /**
     * Controller constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        $this->checkAccess();
    }

    /**
     * @param $message
     * @param string $status
     * @return array
     */
    protected function message($message, $status = 'error'): array
    {
        return compact('status', 'message');
    }

    /**
     * @param $name
     * @return mixed
     */
    private function loadModel($name)
    {
        $path = 'App\models\\' . ucfirst($name);

        if (class_exists($path))
            return new $path;
    }

    private function checkAccess()
    {
        $roles = [
            '1' => 'admin',
            '2' => 'client'
        ];

        $currentRole = isset($_SESSION['role_id']) ? $roles[$_SESSION['role_id']] : 'guest';

//        if ($this->route['controller'] === 'main')
//            $this->view->redirect('login');

        if (isset($_SESSION['role_id'])) {
            if ($this->route['controller'] === 'account' && $this->route['action'] !== 'logout')
                $this->view->redirect('tasks');

            if (!in_array($currentRole, $this->route['allowed']))
                View::error(404);

        } else {
            if ($this->route['controller'] !== 'account' && !in_array($this->route['action'], ['login', 'registration'])) {
                View::error(404);
            }
        }
    }
}
