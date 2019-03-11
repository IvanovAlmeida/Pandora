<?php
/**
 * Created by PhpStorm.
 * User: ivano
 * Date: 10/03/2019
 * Time: 22:38
 */

namespace App\Controller;


use App\Resources\Database\Database;
use PlugRoute\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->setModel("teste");
    }

    public function index( Request $request) {
        echo "gatinho moo";
    }

    public function ver (Request $request){
        echo"ta vendo ";
    }

    public function login(Request $request){
        if($request->getMethod() == "POST"){
            $data = $request->getBodyFormData();
        }
        $this->renderView('Users/login');
    }

}