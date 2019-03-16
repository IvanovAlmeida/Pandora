<?php
/**
 * Created by PhpStorm.
 * User: Ana
 * Date: 15/03/2019
 * Time: 15:58
 */

namespace App\Model\Table;


use App\Model\Entity\Service;

class ServicesTable extends  Table
{
    public function __construct()
    {
        parent::__construct('Service');
    }

    /**
     * @return Service[]
     */
    public function getAll(){
        return $this->query
            ->table('services')
            ->class(Service::class)
            ->select();
    }

    public function save(Service $servico){
        return $this->query->table('services')
            ->fields(['name','price','description'])
            ->insert([$servico->name, $servico->price, $servico->description]);

    }

    public function delete(int $id){
        return $this->query->table('services')->where(['id = ?'])->delete([$id]);
    }

    /**
     * @param int $id
     * @return Service|null
     */
    public function getById(int $id){
        $busca = $this->query
                        ->table('services')
                        ->class(Service::class)
                        ->where(['id = ?'])
                        ->select([$id]);
        if(!is_null($busca) && count($busca) > 0)
            return $busca[0];
        return null;
    }

    /**
     * @param Service $s
     * @return null|int
     */
    public function update(Service $s){
        return $this->query->table('services')
                    ->fields(['name', 'price', 'description'])
                    ->where(['id = ?'])
                    ->update(
                        [$s->name, $s->price, $s->description],
                        [$s->id]
                    );
    }

}