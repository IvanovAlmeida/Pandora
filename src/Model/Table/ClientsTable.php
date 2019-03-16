<?php
namespace App\Model\Table;

use App\Model\Entity\Client;
use App\Model\Entity\Entity;
use App\Model\Entity\Contact;

/**
 * Class ClientsTable
 * @package App\Model\Table
 */
class ClientsTable extends Table
{
    public function __construct()
    {
        parent::__construct('');
    }

    /**
     * @return Client[]
     */
    public function getAll(){
        return $this->query->table('clients')
                            ->fields(['contacts.*, clients.*'])
                            ->class(Client::class)
                            ->join("INNER JOIN contacts ON clients.contact_id = contacts.id")
                            ->select();
    }

    /**
     * @param int $id
     * @return Client|null
     */
    public function getById(int $id){
        $clients = $this->query->table('clients')
                                ->class(Client::class)
                                ->where(['id = ?'])
                                ->select([$id]);

        if(!is_null($clients) && count($clients) > 0){
            $client = $clients[0];

            if(!is_null($client->contact_id) && $client->contact_id != 0){
                $contacts = $this->query->table('contacts')
                                        ->class(Contact::class)
                                        ->where(['id = ?'])
                                        ->select([$client->contact_id]);
                if(!is_null($contacts) && count($contacts) > 0)
                    $client->Contact = $contacts[0];
            } else {
                $client->Contact = new Contact();
            }
            return $client;
        }

        return null;
    }

    public function save(Client $c){
        $con = $c->Contact;
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

        $c->contact_id = $idContato;

        return $this->query->table('clients')
                            ->fields(['name', 'cpf', 'cnpj', 'contact_id'])
                            ->insert([$c->name, $c->cpf, $c->cnpj, $c->contact_id]);
    }

    public function update(Client $c){
        $con = $c->Contact;
        $this->query->table('contacts')
                    ->fields([
                        'telephone', 'email', 'address',
                        'city', 'state', 'country', 'zipCode'
                    ])
                    ->where(['id = ?'])
                    ->update(
                        [
                            $con->telephone, $con->email, $con->address,
                            $con->city, $con->state, $con->country, $con->zipCode
                        ],
                        [$c->id]
                    );
        return $this->query->table('clients')
                            ->fields(['name', 'cpf', 'cnpj'])
                            ->where(['id = ?'])
                            ->update(
                                [$c->name, $c->cpf, $c->cnpj],
                                [$c->id]
                            );
    }


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