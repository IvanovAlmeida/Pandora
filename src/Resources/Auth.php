<?php
namespace App\Resources;

use App\Model\Entity\User;

/**
 * Class Auth
 * @package App\Resources
 */
class Auth
{
    /**
     * Salva o dados do usuário na sessão
     * @param User $user
     */
    public function setUser(User $user){
        unset($user->password);
        Session::set('Auth.User', $user);
    }

    /**
     * Retorna um usuário salvo na sessão
     * @return array|mixed|null
     */
    public function getUser(){
        return Session::get('Auth.User');
    }

    /**
     * Remove o usuário da sessão
     */
    public function logout(){
        Session::unset('Auth.User');
    }

    /**
     * Verifica se está autenticado
     * @return bool
     */
    public function isAuthenticated(){
        return !is_null(Session::get('Auth.User'));
    }
}