<?php
namespace App\Model\Table;

use App\Resources\Database\Database;

class Table
{
    protected $con;
    private $_dbTable;

    public function __construct(string $dbTable)
    {
        $this->con = Database::open();
        $this->_dbTable = $dbTable;
    }
}