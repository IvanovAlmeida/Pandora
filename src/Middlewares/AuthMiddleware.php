<?php
namespace App\Middlewares;

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
        if(!$auth->isAuthenticated())
            $request->redirect('/login');

        return $request;
    }
}