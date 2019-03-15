<?php
namespace App\Controller;

use App\Model\Entity\Item;
use App\Model\Table\ItemsTable;
use PlugRoute\Http\Request;
use PlugRoute\Http\Response;

/**
 * Class ItemsController
 * @package App\Controller
 * @property ItemsTable $Items
 */
class ItemsController extends Controller
{
    /**
     * ItemsController constructor.
     * @param Request $request
     * @param Response $response
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function index(){

        $items = $this->Items->getAll();

        $this->View->set("items", $items)
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

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function add(){
        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();

            $item           = new Item();
            $item->name     = $data['name'];
            $item->price    = $data['price'];
            $item->quantity = $data['quantity'];

            $rt = $this->Items->save($item);
            if(!is_null($rt)){
                $this->View->setSuccessMessage('Item cadastrado com sucesso!');
                $this->getRequest()->redirectToRoute('items');
            } else {
                $this->View->setErrorMessage('Erro ao salvar o item');
            }
        }
        $this->View->setView('Items.add')->render();
    }

    public function delete(){
        if($this->getRequest()->getMethod() == "DELETE"){
            $id = $this->getRequest()->getRequisitionBody("DELETE")['id'];

            $rt = $this->Items->delete($id);

            $msg = [ 'msg' => 'erro' ];
            if(!is_null($rt))
                $msg = [ 'msg' => 'sucesso' ];

            echo $this->getResponse()->json($msg);
        }
    }
}
