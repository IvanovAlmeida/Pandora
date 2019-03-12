<?php

namespace App\Controller;


class UsersController extends Controller
{

    public function __construct(\PlugRoute\Http\Request $request)
    {
        parent::__construct($request);
        $this->setModel("teste");
    }

    public function index() {
        echo "gatinho moo";
    }

    public function view (){
        echo"ta vendo ";
    }

    public function login(){
        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyFormData();
        }
        $this->renderView('Users/login');
    }

}