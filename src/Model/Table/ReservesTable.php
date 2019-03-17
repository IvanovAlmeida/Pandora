<?php

namespace App\Model\Table;

use App\Model\Entity\Entity;
use App\Model\Entity\Reserve;

/**
 * Class ReservesTable
 * @package App\Model\Table
 *
 * @property ClientsTable $Clients
 * @property ItemsTable $Items
 * @property ServicesTable $Services
 * @property SpacesTable $Spaces
 */
class ReservesTable extends Table
{
    public function __construct()
    {
        parent::__construct('');

        $this->Clients = new ClientsTable();
        $this->Items = new ItemsTable();
        $this->Services = new ServicesTable();
        $this->Spaces = new SpacesTable();
    }

    public function getAll(){

        $reservas = $this->query->table('reserves r')
                                ->fields(['r.*', 'c.name'])
                                ->join("INNER JOIN clients AS c ON c.id = r.client_id")
                                ->class(Reserve::class)
                                ->select();
        return $reservas;
    }

    public function proximos(){
        $reservas = $this->query->table('reserves r')
                                    ->fields(['r.*', 'c.name'])
                                    ->join("INNER JOIN clients AS c ON c.id = r.client_id")
                                    ->where(['r.eventDate >= NOW()'])
                                    ->order(['eventDate'])
                                    ->class(Reserve::class)
                                    ->select();

        return $reservas;
    }

    public function save(Reserve $r){
        $rt = $this->query->table('reserves')
                            ->fields(['space_id', 'client_id', 'value', 'entry', 'eventDate', 'eventName'])
                            ->insert([$r->space_id, $r->client_id, $r->value, $r->entry, $r->eventDate, $r->eventName]);

        if(is_null($rt))
            return null;

        foreach ($r->Services as $service){
            $this->query->table('services_reserve')
                        ->fields(['reserve_id', 'service_id'])
                        ->insert([$rt, $service]);
        }

        foreach ($r->Items as $item){
            $this->query->table('items_reserve')
                ->fields(['reserve_id', 'item_id'])
                ->insert([$rt, $item]);
        }

        return $rt;
    }

    public function update(){

    }



}