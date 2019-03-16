<?php
namespace App\Controller;

use PlugRoute\Http\Request;
use PlugRoute\Http\Response;
use App\Model\Entity\Service;
use App\Model\Table\ServicesTable;

/**
 * Class ServicesController
 * @package App\Controller
 * @property ServicesTable $Services
 */
class ServicesController extends Controller
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index(){

        $services = $this->Services->getAll();

        $this->View->set("services" , $services)
            ->setView('Services.index')
            ->render();
    }

    public function view(){
        $id = $this->getRequest()->parameter('id');

        $this->View->set("id", $id)
            ->setView('Services.view')
            ->render();

    }

    public function add(){
        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();

            $servico = new Service();
            $servico->name     = $data['name'];
            $servico->price    = $data['price'];
            $servico->description = $data['description'];

            $rt = $this->Services->save($servico);
            if(!is_null($rt)){
                $this->View->setSuccessMessage('Serviço cadastrado com sucesso!');
                $this->getRequest()->redirectToRoute('services');
            } else {
                $this->View->setErrorMessage('Erro ao salvar o serviço');
            }
        }
        $this->View->setView('Services.add')->render();
    }

    public function delete(){
        if($this->getRequest()->getMethod() == "DELETE"){
            $id = $this->getRequest()->getRequisitionBody("DELETE")['id'];

            $rt = $this->Services->delete($id);

            $msg = [ 'msg' => 'erro' ];
            if(!is_null($rt))
                $msg = [ 'msg' => 'sucesso' ];

            echo $this->getResponse()->json($msg);
        }
    }

    public function edit(){
        $id = $this->getRequest()->parameter('id');
        $service = $this->Services->getById($id);

        if(is_null($service)){
            $this->View->setErrorMessage("Página não existente!");
            $this->getRequest()->redirectToRoute('services');
        }

        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();
            $service = $this->Services->patchEntity($data, $service);

            $rt = $this->Services->update($service);

            if(!is_null($rt) && $rt == 1) {
                $this->View->setSuccessMessage('Serviço atualizado com sucesso!');
                $this->getRequest()->redirectToRoute('services');
            } else {
                $this->View->setErrorMessage('Erro ao atualizar o serviço!');
            }
        }

        $this->View->set('servico', $service)->setView('Services.edit')->render();
    }
}
