<?php

namespace App\Model\Table;

use App\Model\Entity\Entity;
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
            ->fields(['contacts.*, spaces.*'])
            ->join("LEFT JOIN contacts ON spaces.contact_id = contacts.id")
            ->class(Space::class)
            ->select();
    }

    public function save(Space $space){

        $con = $space->Contact;
        $idContato = $this->query->table('contacts')
            ->fields([
                'telephone', 'email', 'address',
                'city', 'state', 'country', 'zipCode'
            ])
            ->insert([
                $con->telephone, $con->email, $con->address,
                $con->city, $con->state, $con->country, $con->zipCode
            ]);

        if(is_null($idContato))
            return null;

        $space->contact_id = $idContato;

        return $this->query->table('spaces')
            ->fields(['name', 'contact_id'])
            ->insert([$space->name, $space->contact_id]);
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

    /**
     * @param array $data
     * @param Entity $entity
     * @return Entity
     */
    public function patchEntity(array $data, Entity $entity){
        foreach ($data as $field => $value) {
            if(is_array($value) && $field == "Contact"){
                $model = "App\Model\Entity\\" . $field;
                $entity->{$field} = new $model();
                foreach ($value as $key => $v){
                    $entity->{$field}->{$key} = $v;
                }
            } else {
                $entity->{$field} = $value;
            }
        }

        return $entity;
    }
}