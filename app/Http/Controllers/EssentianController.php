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
        $request -> validate(
        [
            'pengguna_nama' => ['required'],
            'pengguna_email' => ['required', 'email'],
            'pengguna_password' => ['required', 'confirmed'],
            'pengguna_password_confirmation' => ['required'],
            'pengguna_nohp' => ['required', 'numeric','digits_between:10,12'],
            'pengguna_tanggallahir' => ['required'],
            'pengguna_alamat' => ['required']
        ],
        [
            'pengguna_nama.required' => "Field Nama wajib diisi",
            'pengguna_email.required' => "Field Email wajib diisi",
            'pengguna_password.required' => "Field Password wajib diisi",
            'pengguna_password.confirmed' => "Password Confirmation tidak sesuai dengan Password",
            'pengguna_password_confirmation.required' => "Field Password Confirmation wajib diisi",
            'pengguna_nohp.required' => "Field No.HP wajib diisi",
            'pengguna_tanggallahir.required' => "Field Tanggal Lahir wajib diisi",
            'pengguna_alamat.required' => "Field Alamat wajib diisi",
        ]);

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
