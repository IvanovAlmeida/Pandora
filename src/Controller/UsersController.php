<?php

namespace App\Controller;

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
        $users = [];

        $u = new \stdClass();
        $u->id = 1;
        $u->name = "Nome 1";
        $users[] = $u;

        $u = new \stdClass();
        $u->id = 2;
        $u->name = "Nome 2";
        $users[] = $u;

        $this->View->set('users', $users);
        $this->View->setView('Users.index');
        $this->View->render();
    }

    public function view (){
        $this->View->render();
    }

    public function login(){
        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyFormData();
        }
        $this->View->render();
    }

}