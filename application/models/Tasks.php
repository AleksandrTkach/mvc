<?php

namespace App\models;

use App\core\Model;
use App\traits\QueryTasks;

class Tasks extends Model
{
    /**
     * @param string $select
     * @return array
     */
    public function getAllOpenTasks($select = '*'): array
    {
        return $this->db->all('SELECT ' . $select . ' FROM tasks WHERE closed_at IS NULL AND closed_by IS NULL');
    }

    /**
     * @param $id
     * @param string $select
     * @return array
     */
    public function getTask($id, $select = '*'): array
    {
        return $this->db->first('SELECT ' . $select . ' FROM tasks WHERE id=:id', compact('id'));
    }


    public function setTaskDone($id)
    {
        return $this->db->query(
            'UPDATE tasks SET closed_by=' . $_SESSION['id'] . ', closed_at="' . date('Y-m-d H:i:s') . '" WHERE id=:id',
            compact('id')
        );
    }
}
