<?php
namespace App\Controller;

use App\Model\Entity\Client;
use App\Model\Table\ClientsTable;
use PlugRoute\Http\Request;
use PlugRoute\Http\Response;

/**
 * Class ClientsController
 * @package App\Controller
 * @property ClientsTable $Clients
 */
class ClientsController extends Controller
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function index(){
        $clients = $this->Clients->getAll();

        $this->View->set('clients', $clients)->setView('Clients.index')->render();
    }

    public function view(){

    }

    public function add(){


        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyPostRequest();
            $client = $this->Clients->patchEntity($data, new Client());

            $rt = $this->Clients->save($client);

            if(!is_null($rt)){
                $this->View->setSuccessMessage('Cliente cadastrado com sucesso!');
                $this->getRequest()->redirectToRoute('clients');
            } else {
                $this->View->setErrorMessage('Erro ao cadastrar o Cliente');
            }
        }
        $this->View->setView('Clients.add')->render();

    }

    public function edit(){
        $id = $this->getRequest()->parameter('id');
        $client = $this->Clients->getById($id);

        if(is_null($client)){
            $this->View->setErrorMessage("Página não existente!");
            $this->getRequest()->redirectToRoute('clients');
        }

        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();

            $this->Clients->patchEntity($data, $client);

            $rt = $this->Clients->update($client);

            if(!is_null($rt)){
                $this->View->setSuccessMessage('Cliente editado com sucesso!');
                $this->getRequest()->redirectToRoute('clients');
            } else {
                $this->View->setErrorMessage('Erro ao editar o Cliente!');
            }
        }
        $this->View->set('client', $client)->setView('Clients.edit')->render();
    }

    public function delete(){

    }
}