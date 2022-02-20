<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckIfLoginClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard =null)
    {
        if (backpack_auth()->guest()) {
            return $this->respondToUnauthorizedRequest($request);
        }

        if(!backpack_user()->hasRole(['lider','negocio','empresaria','ventas','coord-ventas','administrador'])){
            return $this->respondToUnauthorizedAreaRequest($request);
        }
        return $next($request);
    }

    private function respondToUnauthorizedRequest($request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response(trans('backpack::base.unauthorized'), 401);
        } else {
            return redirect()->guest(route('b.login'));
        }
    }

    private function respondToUnauthorizedAreaRequest($request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response(trans('backpack::base.unauthorized'), 401);
        } else {
            return redirect()->guest(url('/'));
        }
    }
}
