<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BuyerChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_Level == 2){
            return $next($request);
        } else {
            return redirect()->to('/');
        }
    }
}
