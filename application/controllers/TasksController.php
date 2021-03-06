<?php

namespace App\controllers;

use App\core\Controller;

class TasksController extends Controller
{
    public function indexAction()
    {
        $tasks = $this->model->getAllOpenTasks('id, category, title, deadline');

        $this->view->render('Tasks List', compact('tasks'));
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function showAction(int $id)
    {
        $task = $this->model->getTask($id, 'description, deadline');

        $date = new \DateTime($task['deadline']);
        $task['deadline'] = $date->format('H:i:s m-d-Y');

        $this->view->render('Task', $task);
    }

    /**
     * @param int $id
     */
    public function updateAction(int $id)
    {
        $this->model->setTaskDone($id);

        $this->view->redirect('tasks');
    }

    public function uploadAction()
    {
        $this->view->render('Upload tasks');
    }
}
