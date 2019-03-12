<?php

namespace App\Controller;
use App\Resources\Exceptions\MissingTableModelException;
use App\Resources\View;

abstract class Controller
{
    protected $View;
    private $Model;
    private $Request;

    /**
     * Controller constructor.
     * @param \PlugRoute\Http\Request $request
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(\PlugRoute\Http\Request $request)
    {
        $this->Request = $request;
        $this->View = new View();
    }

    /**
     * @return \PlugRoute\Http\Request
     */
    public function getRequest(){
        return $this->Request;
    }

    protected function setModel(string $model){
    }
}































