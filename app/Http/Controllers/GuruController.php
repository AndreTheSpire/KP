<?php

namespace App\Http\Controllers;

use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function GotoHome()
    {
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $idguruuser=Auth::guard('satpam_pengguna')->user()->adalahGuru->guru_id;
        $datasebagaiguru=Kelas::where('guru_id','=',$idguruuser)->get();
        return view("pages.Guru.home",[
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "datasebagaiguru"=> $datasebagaiguru,
        ]);
    }
    public function GoToKelas()
    {

        $dataPelajaran = Pelajaran::get();
        $idguruuser=Auth::guard('satpam_pengguna')->user()->adalahGuru->guru_id;
        $dataGuru=Kelas::where('guru_id','=',$idguruuser)->get();
        return view("pages.Guru.kelas",[
            'title' => "Penetapan",
            "dataGuru" => $dataGuru,
            "dataPelajaran" => $dataPelajaran,
        ]);

    }
    public function GoDetailKelas(Request $request)
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.DetailKelas",[
            'title' => "semua",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
}
