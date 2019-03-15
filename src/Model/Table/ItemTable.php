<?php
namespace App\Model\Table;

use App\Model\Entity\Item;

class ItemTable extends Table
{
    public function __construct()
    {
        parent::__construct('Items');
    }

    /**
     * @return Item[]
     */
    public function getAll() {
        return $this->query
            ->table('items')
            ->class(Item::class)
            ->select();
    }

    /**
     * @param Item $item
     * @return int|null
     */
    public function save(Item $item){
        return $this->query->table('items')
                    ->fields(['name', 'price', 'quantity'])
                    ->insert([$item->name, $item->price, $item->quantity]);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id){
        return $this->query->table('items')->where(['id = ?'])->delete([$id]);
    }
}