<?php

namespace RestlyFriendly;

use RestlyFriendly\Database;

class Model
{

    protected $db;

    public function __construct()
    {

        $this->db === NULL AND $this->db = new Database;

    }

}
