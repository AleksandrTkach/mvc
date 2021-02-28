<?php

namespace App\core;

use App\lib\DB;

abstract class Model //TODO: abstract
{
    public $db;

    public function __construct()
    {
        $this->db = new DB();
    }
}
