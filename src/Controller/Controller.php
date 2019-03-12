<?php
/**
 * Created by PhpStorm.
 * User: ivano
 * Date: 10/03/2019
 * Time: 00:24
 */

namespace App\Controller;
use App\Resources\Exceptions\MissingTableModelException;
use App\Resources\View;

abstract class Controller
{
    protected $view;
    private $model;
    private $request;

    /**
     * Controller constructor.
     * @param \PlugRoute\Http\Request $request
     */
    public function __construct(\PlugRoute\Http\Request $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    /**
     * @return \PlugRoute\Http\Request
     */
    public function getRequest(){
        return $this->request;
    }

    protected function setModel(string $model){
    }
    /**
     * @param string $_name
     * @param array $vars
     */
    protected function renderView(string $_name, array $vars = []){
        $_filename = __DIR__ . "/../View/{$_name}.php";
        if(!file_exists($_filename))
            die("View {$_name} not found!");

        if(!empty($vars)){
            foreach ($vars as $key => $var){
                $$key = $var;
            }
        }
        unset($vars);
        include_once $_filename;
    }

    protected final function params(string $name){
        $params = Router::getRequest();

        if (!isset($params[$name]))
            return null;
        return $params[$name];
    }

    protected final function redirect(string $to){
        $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        $folders = explode('?', $_SERVER['REQUEST_URI'])[0];

        header('Location:' . $url . $folders . '?r=' . $to);
        exit();
    }
}































