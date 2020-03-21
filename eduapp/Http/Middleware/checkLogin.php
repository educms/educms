<?php

namespace App\Http\Middleware;

use Closure;

class checkLogin
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
        $response = $next($request);
 
        if (
                !$request->session()->has('user_displayname') && 
                !$request->session()->has('user_id') &&
                !$request->session()->has('user_role')
            ){
 
            return redirect('mypanel/auth/login');
        }
 
        return $response;
    }
}
