<?php
namespace App\Controller;

class ReservesController extends Controller
{
    /**
     * ReservesController constructor.
     * @param \PlugRoute\Http\Request $request
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(\PlugRoute\Http\Request $request, \PlugRoute\Http\Response $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function index(){
        $this->View->set("teste", 'alow');

        $this->View->setView('Reserves.index');
        $this->View->render();
    }
}