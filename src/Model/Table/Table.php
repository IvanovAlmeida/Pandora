<?php
namespace App\Model\Table;

use App\Model\Entity\Entity;
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

    /**
     * @param array $data
     * @param Entity $entity
     * @return Entity
     */
    public function patchEntity(array $data, Entity $entity){
        foreach ($data as $field => $value)
            $entity->{$field} = $value;

        return $entity;
    }
}