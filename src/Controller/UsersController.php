<?php

namespace App\Controller;

use App\Model\Table\UsersTable;
use App\Model\Entity\User;

/**
 * Class UsersController
 * @package App\Controller
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor.
     * @param \PlugRoute\Http\Request $request
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(\PlugRoute\Http\Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function index() {

        $table = new UsersTable();
        $users = $table->getAll();

        $this->View->set('users', $users);
        $this->View->setView('Users.index');
        $this->View->render();
    }

    public function view (){


        $this->View->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingLayoutException
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function login(){
        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyPostRequest();

            $username = $data['username'];
            $password = $data['password'];

            $table = new UsersTable();
            $user = $table->query->table('users')->where(['username = ?'])->select([$username]);

            if(count($user) > 0 && password_verify($password, $user[0]->password)) {
                echo "<script>alert('Logado!');</script>";
            } else {
                echo "<script>alert('Não Logado!');</script>";
            }
        }
        $this->View->setLayout('login')->setView('Users.login')->render();
    }

}