<?php

namespace App\controllers;

use App\core\Controller;

class TasksController extends Controller
{
    public function indexAction()
    {
        $tasks = $this->model->getAllTasks('category, title, deadline');

        $this->view->render('Tasks List', compact('tasks'));
    }
    public function showAction()
    {
        $this->view->render('Task');
    }

    public function uploadAction()
    {
        $this->view->render('Upload tasks');
    }
}
