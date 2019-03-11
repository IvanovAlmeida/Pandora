<?php
namespace App\Model\Table;

use App\Resources\Database\Database;

class Table
{
    protected $con;

    public function __construct()
    {
        $this->con = Database::open();
    }
}