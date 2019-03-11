<?php
/**
 * Created by PhpStorm.
 * User: ivano
 * Date: 10/03/2019
 * Time: 22:38
 */

namespace App\Controller;


use PlugRoute\Http\Request;

class UsersController extends Controller
{
    public function index( Request $request) {
        echo "gatinho moo";
    }

    public function ver (Request $request){
        echo"ta vendo ";
    }

}