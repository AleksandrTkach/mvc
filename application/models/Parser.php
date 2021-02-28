<?php

namespace App\models;

use App\core\Model;
use App\traits\QueryTasks;

class Parser extends Model
{
    /**
     * @param string $select
     * @return array
     */
    public function getOpenTasks($select = '*'): array
    {
        return $this->db->all('SELECT ' . $select . ' FROM tasks WHERE closed_at IS NULL AND closed_by IS NULL');
    }

    /**
     * @param $params
     */
    public function tasksStore($params)
    {
        $this->db->query(
            'INSERT INTO tasks (category, title, deadline, description) VALUES (:category, :title, :deadline, :description)',
            $params
        );
    }
}