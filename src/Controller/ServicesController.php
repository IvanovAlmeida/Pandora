<?php


namespace App\Controller;



use PlugRoute\Http\Request;
use PlugRoute\Http\Response;
use App\Model\Entity\Service;
use App\Model\Table\ServicesTable;

class ServicesController extends Controller
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index(){
        $table = new ServicesTable();
        $services = $table->getAll();

        $this->View->set("Services" , $services)
            ->setView('Services.index')
            ->render();
    }

    public function view(){
        $id = $this->getRequest()->parameter('id');

        $this->View->set("id", $id)
            ->setView('Services.view')
            ->render()

    }

    public function add(){
        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();

            $servico = new Service();
            $servico->name     = $data['name'];
            $servico->price    = $data['price'];
            $servico->description = $data['description'];

            $table = new ItemTable();
            $rt = $table->save($item);
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

            $table = new ItemTable();
            $rt = $table->delete($id);

            $msg = [ 'msg' => 'erro' ];
            if(!is_null($rt))
                $msg = [ 'msg' => 'sucesso' ];

            echo $this->getResponse()->json($msg);
        }
    }
}
