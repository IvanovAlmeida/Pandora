<?php

namespace App\Model\Entity;

/**
 * Class User
 * @package App\Model\Entity
 */
class User extends Entity
{
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    public $role_id;
    public $status;
    public $created_at;
    public $updated_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function setPassword(string $pass){
        if(!empty($pass))
            $this->password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    /**
     * @param string $password
     * @return bool
     */
    public function verifyPassword(string $password) : bool {
        return password_verify($password, $this->password);
    }
}