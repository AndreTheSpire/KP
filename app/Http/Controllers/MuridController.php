<?php

namespace App\Http\Controllers;

use App\Models\KategoriKelas;
use App\Models\Pelajaran;
use App\Models\PendaftaranMurid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MuridController extends Controller
{
    public function GotoHome()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $datakelasmurid=PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        return view("pages.Murid.home",[
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "datakelasmurid" => $datakelasmurid,
        ]);
    }
    public function GodaftarMurid(Request $request)
    {
        // $request->validate([
        //     'kelas_nama'=>'required',
        //     'kelas_deskripsi'=>'required',
        //     'waktu_mulai'=>'required',
        //     'waktu_selesai'=>'required|after:waktu_mulai',
        // ],[
        //     'kelas_nama.required'=>'kolom ini tidak boleh kosong',
        //     'kelas_deskripsi.required'=>'kolom ini tidak boleh kosong',
        //     'waktu_mulai.required'=>'kolom ini tidak boleh kosong',
        //     'waktu_selesai.required'=>'kolom ini tidak boleh kosong',
        //     'waktu_selesai.after'=>'kolom ini tidak boleh sebelum waktu mulai',
        // ]);

        $pengguna_id =$request->guru_kelas;
        $kelas_nama = explode(' ', $request->kelas_nama);
        $hasil= PendaftaranMurid::create($request->all()+ ['pendaftaranmurid_status' => -1, 'pendaftaranmurid_buktibayar' => "kosong"]);
        if ($hasil) {
            Alert::success('Succes', 'berhasil mendaftar kelas! silahkan cek email anda');
            return back();
        } else {
            Alert::success('Succes', 'gagal mendaftar kelas');
            return back();
        }
    }
}
