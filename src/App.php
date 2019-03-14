<?php
namespace App;

use PlugRoute\PlugRoute;
use App\Resources\Session;

class App
{
    /**
     * @var PlugRoute
     */
    private $_route;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     *
     */
    private function initialize(){
        $this->registerRoutes();
        $this->initSession();
    }

    /**
     *
     */
    private function initSession(){
        Session::init();
    }

    /**
     * @return $this
     */
    private function registerRoutes(){
        $this->_route = include_once 'Resources' . DS . 'Routes.php';
        return $this;
    }

    /**
     *
     */
    public function start(){
        $this->_route->on();
    }
}