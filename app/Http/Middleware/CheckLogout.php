<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckLogout
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

        if(Auth::guard('satpam_pengguna')->check()){
            if(getAuthUser()->getRoleTextAttribute == 'guru'){
                return redirect('/guru');
            }else{
                return redirect('/murid');
            }
        }else{
            return $next($request);
        }


    }
}
