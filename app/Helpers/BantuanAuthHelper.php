<?php

use Illuminate\Support\Facades\Auth;
/**
 * jangan lupa daftarkan helper buatan anda di composer.json
 *
 * composer.json bertugas untuk mendaftarkan file apa saja yang nanti dijalankan pada saat laravel saya jalan (autoload)
 *
 * jangan lupa generate ulang autoload kita
 * composer dump-autoload / composer du
 */

function sudahlogin()
{
    if(Auth::guard('web')->check() || Auth::guard('satpam_pengguna')->check()){
        return true;
    }else{
        return false;
    }

}
function getAuthUser()
{
    if(sudahlogin()==false){
        return false;
    }else{
        if(Auth::guard('web')->check()){
            return Auth::guard('web')->user();
        }else if(Auth::guard('satpam_pengguna')->check()){
            return Auth::guard('satpam_pengguna')->user();
        }

    }
}
