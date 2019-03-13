<?php
namespace App\Model\Table;

use App\Resources\Database\QueryBuilder;

class Table
{
    /**
     * @var QueryBuilder
     */
    public $query;

    public function __construct(string $dbTable)
    {
        $this->query = new QueryBuilder();
    }
}