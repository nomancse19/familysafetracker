<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperAdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_type=Session::get('user_type');
        if(Session::has('user_type')){
            if($user_type==1){
                return $next($request);
            }else{
                return redirect()->route('login');
            }
            
        }else{
            return redirect()->route('login');
        }
    }
}
