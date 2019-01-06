<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class adminMiddleware
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

        if(Auth::guard()->check() ){

            if(Auth::user()->isAdmin()){
               // return redirect('adminpanel');
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('Adminlogin');
        }

        return $next($request);
    }
}
