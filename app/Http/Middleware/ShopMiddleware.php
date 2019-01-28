<?php

namespace App\Http\Middleware;

use App\Database\Shop;
use Closure;

class ShopMiddleware
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
        if(!session()->has('shop_id') || !Shop::all()->count()){
            return redirect()->route('shops');
        }
        
        return $next($request);
    }
}
