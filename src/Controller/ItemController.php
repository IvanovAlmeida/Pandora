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
    /**
     * ItemController constructor.
     * @param Request $request
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(\PlugRoute\Http\Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function index(){
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

        $this->View->set("itens", $itens)
            ->setView('Items.index')
            ->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function view(){
        $id = $this->getRequest()->parameter('id');

        $this->View->set("id", $id)
            ->setView('Items.view')
            ->render();
    }
}