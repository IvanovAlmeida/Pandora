<?php
/**
 * Created by PhpStorm.
 * User: ivano
 * Date: 10/03/2019
 * Time: 00:21
 */
namespace App\Controller;

use App\Model\Entity\Item;
use PlugRoute\Helpers\RequestHelper;
use PlugRoute\Http\Request;
use PlugRoute\PlugRoute;
use PlugRoute\Route;

class ItemController extends Controller
{
    public function index(\PlugRoute\Http\Request $request){

        $itens = [];

        $i = new Item();
        $i->id = 1515;
        $i->nome = "Teste";
        $itens[] = $i;

        $i = new Item();
        $i->id = 8498;
        $i->nome = "Teste 122";
        $itens[] = $i;

        $i = new Item();
        $i->id = 545;
        $i->nome = "Teste33";
        $itens[] = $i;

        $i = new Item();
        $i->id = 151875;
        $i->nome = "Teste 55";
        $itens[] = $i;

        $i = new Item();
        $i->id = 58585;
        $i->nome = "Teste 33";
        $itens[] = $i;

        return self::view("Itens", ["itens" => $itens]);
    }

    public function ver(\PlugRoute\Http\Request $request){
        $id = $request->parameter('id');

        //$this->Item->get($id);

        self::view('Usuarios', ['id' => $id]);
    }
}