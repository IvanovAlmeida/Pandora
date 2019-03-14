<?php
namespace App\Middlewares;

use App\Resources\Session;
use PlugRoute\Http\Request;
use PlugRoute\Middleware\PlugRouteMiddleware;
use App\Resources\Auth;

/**
 * Class AuthMiddleware
 * @package App\Middlewares
 */
class AuthMiddleware implements PlugRouteMiddleware
{
    /**
     * @param Request $request
     * @return Request
     */
    public function handle(Request $request): Request
    {
        $auth = new Auth();
        if(!$auth->isAuthenticated()){
            $messages[] = [ 'type' => 'error', 'message' => 'Acesso não autorizado!' ];
            Session::set('messages', $messages);
            $request->redirect('/login');
        }
        return $request;
    }
}