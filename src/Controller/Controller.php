<?php

namespace App\Controller;

use \App\Resources\View;
use \App\Resources\Auth;

use \PlugRoute\Http\Response;
use \PlugRoute\Http\Request;


abstract class Controller
{
    /**
     * @var View
     */
    protected $View;
    /**
     * @var Request
     */
    private $Request;
    /**
     * @var Response
     */
    private $Response;
    /**
     * @var Auth
     */
    private $Auth;

    /**
     * Controller constructor.
     * @param \PlugRoute\Http\Request $request
     * @param \PlugRoute\Http\Response $response
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(Request $request, Response $response)
    {
        $this->Request = $request;
        $this->Response = $response;
        $this->setModel();

        $this->View = new View();
        $this->Auth = new Auth();
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

    /**
     * @return \App\Resources\Auth
     */
    public function getAuth(){
        return $this->Auth;
    }

    /**
     *
     */
    private function setModel(){
        $nameModel = substr(get_class($this), 15, strlen(get_class($this)));
        $nameModel = substr($nameModel, 0, (strlen($nameModel) - 10));
        $model = '\App\Model\Table\\' . $nameModel  . "Table";

        if(class_exists($model)){
            $this->$nameModel = new $model;
        }
    }
}































