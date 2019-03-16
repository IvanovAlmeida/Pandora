<?php
namespace App\Model\Table;

use App\Model\Entity\Entity;
use App\Model\Entity\User;

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
     * @return User[]
     */
    public function getAll(){
        return $this->query
                        ->table('users')
                        ->class(User::class)
                        ->select();
    }

    /**
     * @param string $username
     * @return User |null
     */
    public function findByUsername(string $username){
        $user = $this->query
                     ->table('users')->class(User::class)
                     ->where(['username = ?'])->select([$username]);

        if(count($user) > 0)
            return $user[0];
        return null;
    }
}