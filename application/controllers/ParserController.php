<?php

namespace App\controllers;

use App\core\Controller;

class ParserController extends Controller
{
    public function indexAction()
    {
        $tasksOpen = $this->formatTasks($this->model->getOpenTasks('title, deadline'));

        $tasksNew = $this->parserTasks($tasksOpen); //TODO: output on view

        $this->view->redirect('tasks');
    }

    /**
     * @param $tasksOpen
     * @return array
     */
    private function parserTasks($tasksOpen): array
    {
        $fpDest = fopen($_FILES['file']['tmp_name'], 'r');

        $tasksNew = [];
        while (!feof($fpDest)) {
            $line = trim(fgets($fpDest));
            $regexpTime = '/[0-9]{4}-[0,1][0-9]-[0-3][0-9]T[0-2][0-9]:[0-6][0-9]:[0-6][0-9]\+00:00/';

            preg_match($regexpTime, $line, $time);
            $deadline = $time[0];

            $left = mb_stristr($line, ';', true);

            $description = trim(
                str_replace(';', '', mb_stristr($line, ';'))
            );
            $category = trim(
                mb_stristr($left, $deadline, true)
            );
            $title = trim(
                str_replace($deadline, '', mb_stristr($left, $deadline))
            );

            if ($this->checkDuplicate($tasksOpen, $title, $deadline)) {
                continue;
            }

            $data = compact('category', 'title', 'deadline', 'description');

            $this->model->tasksStore($data);

            $tasksNew[] = $data;
        }

        return $tasksNew;
    }

    /**
     * @param array $items
     * @return array
     */
    private function formatTasks(array $items): array
    {
        $res = [];
        if (count($items)) {
            foreach ($items as $item) {
                $res[$item['title']][] = strtotime($item['deadline']);
            }
        }

        return $res;
    }

    /**
     * @param $tasksOpen
     * @param $title
     * @param $deadline
     * @return bool
     */
    private function checkDuplicate($tasksOpen, $title, $deadline): bool
    {
        $res = false;
        if (isset($tasksOpen[$title])) {
            foreach ($tasksOpen[$title] as $deadlineOpenTask) {
                if ($deadlineOpenTask === strtotime($deadline)) {
                    $res = true;
                    break;
                }
            }
        }
        return $res;
    }
}
