<?php
namespace App\Controller;

use App\Model\Entity\Reserve;
use App\Model\Table\ReservesTable;
use PlugRoute\Http\Request;
use PlugRoute\Http\Response;


/**
 * Class ReservesController
 * @package App\Controller
 * @property ReservesTable $Reserves
 */
class ReservesController extends Controller
{
    /**
     * ReservesController constructor.
     * @param \PlugRoute\Http\Request $request
     * @throws \App\Resources\Exceptions\MissingLayoutException
     */
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function home(){
        $this->View->setView('Reserves.home');
        $this->View->render();
    }

    public function index(){
        $reservas = $this->Reserves->getAll();

        $this->View->set('reserves', $reservas)->setView('Reserves.index')->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function add(){
        $reserve = new Reserve();

        $clients    = $this->Reserves->Clients->getAll();
        $items      = $this->Reserves->Items->getAll();
        $services   = $this->Reserves->Services->getAll();
        $spaces     = $this->Reserves->Spaces->getAll();

        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyPostRequest();

            $reserve = $this->Reserves->patchEntity($data, $reserve);

            $rt = $this->Reserves->save($reserve);

            if(!is_null($rt)){
                $this->View->setSuccessMessage('Reserva cadastrada com sucesso!');
                $this->getRequest()->redirectToRoute('reserves');
            } else {
                $this->View->setErrorMessage('Erro ao salvar a reserva');
            }
        }

        $this->View
                ->set('reserve', $reserve)->set('clients', $clients)
                ->set('items', $items)->set('services', $services)
                ->set('spaces', $spaces)
                ->setView('Reserves.add')->render();
    }
}