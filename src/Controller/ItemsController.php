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

    public function edit(){
        $id = $this->getRequest()->parameter('id');
        $item = $this->Items->getById($id);

        if(is_null($item)){
            $this->View->setErrorMessage("Página não existente!");
            $this->getRequest()->redirectToRoute('items');
        }

        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();
            $item = $this->Items->patchEntity($data, $item);

            $rt = $this->Items->update($item);

            if(!is_null($rt) && $rt == 1) {
                $this->View->setSuccessMessage('Item atualizado com sucesso!');
                $this->getRequest()->redirectToRoute('items');
            } else {
                $this->View->setErrorMessage('Erro ao atualizar o item!');
            }
        }

        $this->View->set('item', $item)->setView('Items.edit')->render();
    }
}
