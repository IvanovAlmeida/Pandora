<?php
namespace App\Model\Table;

use App\Resources\Database\QueryBuilder;

class Table
{
    /**
     * @var QueryBuilder
     */
    protected $query;

    public function __construct(string $dbTable)
    {
        $this->query = new QueryBuilder();
    }
}