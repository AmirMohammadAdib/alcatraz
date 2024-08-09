<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd('ok');
        if(auth()->check()){
            if(auth()->user()->role == 1){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
