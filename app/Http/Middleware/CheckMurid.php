<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckMurid
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
            if(getAuthUser()->role_text == 'murid'){
                return $next($request);
            }else{
                return redirect('/guru');
            }
        }else{
            return response()->view('pages.essential.login');
        }


    }
}
