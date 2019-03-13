<?php

namespace App\Controller;

use App\Model\Table\UsersTable;

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
            $data = $this->getRequest()->getBodyFormData();
        }
        $this->View->setLayout('login')->setView('Users.login')->render();
    }

}