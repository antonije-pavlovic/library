<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheck
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

        if($request->session()->has('user')){
           if($request->session()->get('user')[0]->role_id == 2)
               return $next($request);
           else
               return redirect('/');
        }            //dd('aloooo');//return $next($request);
        else
            return redirect('/unauthorized');
    }
}
