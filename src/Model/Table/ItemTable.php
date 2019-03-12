<?php
namespace App\Model\Table;

use App\Model\Entity\Item;

class ItemTable extends Table
{
    public function __construct()
    {
        parent::__construct('Items');
    }

    public function getAll() {

    }
}