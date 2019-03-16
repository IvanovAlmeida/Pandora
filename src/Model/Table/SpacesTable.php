<?php

namespace App\Model\Table;

use App\Model\Entity\Contact;
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

    /**
     * @param int $id
     * @return int|null
     */
    public function delete(int $id){
        $sql  = "DELETE s, c FROM spaces s INNER JOIN contacts AS c ON c.id = s.contact_id WHERE s.id = ?";
        return $this->query->execute($sql, [$id]);
    }

    public function getById(int $id){
        $busca = $this->query
            ->table('spaces')
            ->class(Space::class)
            ->where(['id = ?'])
            ->select([$id]);

        if(!is_null($busca) && count($busca) > 0){
            $space = $busca[0];

            if(!is_null($space->contact_id) && $space->contact_id != 0){
                $contacts = $this->query->table('contacts')
                    ->class(Contact::class)
                    ->where(['id = ?'])
                    ->select([$space->contact_id]);
                if(!is_null($contacts) && count($contacts) > 0)
                    $space->Contact = $contacts[0];
            } else {
                $space->Contact = new Contact();
            }
            return $space;
        }
        return null;
    }

    public function update(Space $s){
        $spa = $s->Contact;
        $this->query->table('contacts')
            ->fields([
                'telephone', 'email', 'address',
                'city', 'state', 'country', 'zipCode'
            ])
            ->where(['id = ?'])
            ->update(
                [
                    $spa->telephone, $spa->email, $spa->address,
                    $spa->city, $spa->state, $spa->country, $spa->zipCode
                ],
                [$spa->id]
            );
        return $this->query->table('spaces')
            ->fields(['name'])
            ->where(['id = ?'])
            ->update(
                [$s->name],
                [$s->id]
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