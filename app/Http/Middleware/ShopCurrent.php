<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class ShopCurrent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::exists('shop_id')){
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->route('b.selectshop');
            }
        }
        return $next($request);
    }
}
