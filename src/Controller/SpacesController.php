<?php
namespace App\Controller;
use App\Model\Entity\Space;
use App\Model\Table\SpacesTable;
use PlugRoute\Http\Request;
use PlugRoute\Http\Response;

/**
 * Class SpacesController
 * @package App\Controller
 * @property  SpacesTable $Spaces
 */
class SpacesController extends  Controller
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function index(){

        $spaces = $this->Spaces->getAll();

        $this->View->set("espacos", $spaces)
            ->setView('Spaces.index')
            ->render();
    }

    public function view(){
        $id = $this->getRequest()->parameter('id');

        $this->View->set("id", $id)
            ->setView('Spaces.view')
            ->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function add(){
        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();

            $space = $this->Spaces->patchEntity($data, new Space());
            $rt = $this->Spaces->save($space);
            if(!is_null($rt)){
                $this->View->setSuccessMessage('Espaço cadastrado com sucesso!');
                $this->getRequest()->redirectToRoute('spaces');
            } else {
                $this->View->setErrorMessage('Erro ao salvar o espaço');
            }
        }
        $this->View->setView('Spaces.add')->render();
    }

    public function delete(){
        if($this->getRequest()->getMethod() == "DELETE"){
            $id = $this->getRequest()->getRequisitionBody("DELETE")['id'];

            $rt = $this->Spaces->delete($id);

            $msg = [ 'msg' => 'erro' ];
            if(!is_null($rt))
                $msg = [ 'msg' => 'sucesso' ];

            echo $this->getResponse()->json($msg);
        }
    }

    public function edit(){
        $id = $this->getRequest()->parameter('id');
        $space = $this->Spaces->getById($id);

        if(is_null($space)){
            $this->View->setErrorMessage("Página não existente!");
            $this->getRequest()->redirectToRoute('spaces');
        }

        if($this->getRequest()->getMethod() == "POST"){

            $data = $this->getRequest()->getBodyPostRequest();
            $space = $this->Spaces->patchEntity($data, $space);

            $rt = $this->Spaces->update($space);

            if(!is_null($rt) && $rt == 1) {
                $this->View->setSuccessMessage('Espaço atualizado com sucesso!');
                $this->getRequest()->redirectToRoute('spaces');
            } else {
                $this->View->setErrorMessage('Erro ao atualizar o espaço!');
            }
        }

        $this->View->set('space', $space)->setView('Spaces.edit')->render();
    }

}