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
    public function getAllTasks($select = '*'): array
    {
        return $this->db->all('SELECT ' . $select . ' FROM tasks');
    }
}
