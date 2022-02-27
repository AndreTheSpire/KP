<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EssentianController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }
    public function DoRegister(Request $request)
    {

        $nama_file="kosong";
        $file = $request->file('pengguna_CV_KTP');
        // dd($file);
        if($file==null){

        }else{
            $nama_file = $file->getClientOriginalName();
            $request->file('pengguna_CV_KTP')->storeAs('DataUser/',$nama_file, 'local');
        }

        $role=$request->input('pengguna_peran');
        // dd($request->all());
        $result = Pengguna::create($request->all()+ ['pengguna_CV_KTP' => $nama_file]+ ['pengguna_status_CV' => '0']+ ['pengguna_status_wawancara' => '0']);
        // dd($result);
        $password = Hash::make($request->pengguna_password);
        $result->pengguna_password=$password;
        if($role=='1'){
            $result->pengguna_status_CV="0";
            $result->pengguna_status_wawancara="0";
        }else{
            $result->pengguna_status_CV="1";
            $result->pengguna_status_wawancara="1";
        }
        // dd($request->all());
        $result->save();



        return back();
    }

}
