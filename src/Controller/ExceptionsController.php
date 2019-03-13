<?php
namespace App\Controller;

use PlugRoute\Http\Request;
use PlugRoute\Http\Response;

class ExceptionsController extends Controller
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index(){
    }

    /**
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function error404(){
        $this->View->setLayout('../Errors/404');
        $this->View->render();
    }
}