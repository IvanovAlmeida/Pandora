<?php
namespace App\Controller;

class ReservesController extends Controller
{
    public function __construct(\PlugRoute\Http\Request $request)
    {
        parent::__construct($request);
        $this->view->setLayout('default');
    }

    public function index(){
        var_dump($this->getRequest()->getMethod());

        $this->view->set("teste", 'alow');

        $this->view->setView('Reserves.index');
        $this->view->render();
    }
}