<?php

namespace App\Controller;
use App\Resources\Exceptions\MissingTableModelException;
use App\Resources\View;

abstract class Controller
{
    protected $View;
    private $Model;
    private $Request;
    private $Response;

    /**
     * Controller constructor.
     * @param \PlugRoute\Http\Request $request
     * @param \PlugRoute\Http\Response $response
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(\PlugRoute\Http\Request $request, \PlugRoute\Http\Response $response)
    {
        $this->Request = $request;
        $this->Response = $response;
        $this->View = new View();
    }

    /**
     * @return \PlugRoute\Http\Request
     */
    public function getRequest(){
        return $this->Request;
    }

    /**
     * @return \PlugRoute\Http\Response
     */
    public function getResponse(){
        return $this->Response;
    }

    protected function setModel(string $model){
    }
}































