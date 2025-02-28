<?php

namespace App\Controller;

use App\Model\Table\UsersTable;
use App\Model\Entity\User;
use PlugRoute\Http\Response;
use \PlugRoute\Http\Request;

/**
 * Class UsersController
 * @package App\Controller
 * @property UsersTable $Users
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor.
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
    public function index() {

        $users = $this->Users->getAll();

        $this->View->set('users', $users);
        $this->View->setView('Users.index');
        $this->View->render();
    }

    public function view (){
        $this->View->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function add(){

        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyPostRequest();
            $user = new User();

            $user->username = $data['username'];
            $user->setPassword($data['password']);
            $user->email = $data['email'];

            $table = new UsersTable();
            $rt = $table->query
                ->table('users')
                ->fields(['username', 'password', 'email'])
                ->insert([$user->username, $user->password, $user->email]);

            if(!is_null($rt)) {
                $this->View->setSuccessMessage('Usuário cadastrado com sucesso!');
                $this->getRequest()->redirectToRoute('users');
            } else {
                $this->View->setErrorMessage('Erro ao cadastrar usuário!');
            }
        }

        $this->View->setView('Users.add');
        $this->View->render();
    }

    /**
     * @throws \App\Resources\Exceptions\MissingLayoutException
     * @throws \App\Resources\Exceptions\MissingViewException
     */
    public function login(){
        if($this->getRequest()->getMethod() == "POST"){
            $data = $this->getRequest()->getBodyPostRequest();

            $username = $data['username'];
            $password = $data['password'];

            $table = new UsersTable();
            $user = $table->findByUsername($username);

            if(!is_null($user) && $user->verifyPassword($password)) {
                $this->getAuth()->setUser($user);
                $this->View->setSuccessMessage('Login realizado com sucesso!');
                $this->getRequest()->redirect('/');
            } else {
                $this->View->setErrorMessage('Usuário ou Senha incorretos!');
            }
        }
        $this->View->setLayout('login')->setView('Users.login')->render();
    }
    public function logout(){
        $this->getAuth()->logout();
        $this->getRequest()->redirect('/login');
    }
}