<?php

namespace App\core;

use App\lib\DB;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }
}
