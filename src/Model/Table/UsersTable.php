<?php
namespace App\Model\Table;

/**
 * Class UsersTable
 * @package App\Model\Table
 */
class UsersTable extends Table
{
    public function __construct()
    {
        parent::__construct('Users');
    }

    /**
     * @return array
     */
    public function getAll(){
        return $this->query
                        ->table('users')
                        ->select();
    }
}