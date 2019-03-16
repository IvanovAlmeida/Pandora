<?php

namespace App\Model\Table;

use App\Model\Entity\Space;

class SpacesTable extends Table
{
    public function __construct()
    {
        parent::__construct('');
    }

    public function getAll() {
        return $this->query
            ->table('spaces')
            ->class(Space::class)
            ->select();
    }

    public function save(Space $spaces){
        return $this->query->table('spaces')
            ->fields(['name'])
            ->insert([$spaces->name]);
    }

    public function delete(int $id){
        return $this->query->table('spaces')->where(['id = ?'])->delete([$id]);
    }

    public function getById(int $id){
        $busca = $this->query
            ->table('spaces')
            ->class(Space::class)
            ->where(['id = ?'])
            ->select([$id]);
        if(!is_null($busca) && count($busca) > 0)
            return $busca[0];
        return null;
    }

    public function update(Space $i){
        return $this->query->table('spaces')
            ->fields(['name', 'telephone'])
            ->where(['id = ?'])
            ->update(
                [$i->name, $i->telephone],
                [$i->id]
            );
    }
}