<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feed;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $dataFeed=Feed::where('kelas_id','=',$request->id)->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.DetailKelas",[
            'title' => "semua",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataFeed"=>$dataFeed,
        ]);
    }

    public function doAddFeed(Request $request)
    {
        $dataUser = Auth::guard('satpam_pengguna')->user();
        $nama_file="kosong";
        $file = $request->file('lampiran');
        $dataKelas = Kelas::find($request->id);
        if ($dataKelas->kelas_id && $dataUser->pengguna_id && $dataUser->pengguna_nama && $request->keterangan) {
            if($file){
                $nama_file = $file->getClientOriginalName();

                $nama=$nama_file;
                $hasil = Feed::create([
                    "kelas_id" => $dataKelas->kelas_id,
                    "pengguna_id" => $dataUser->pengguna_id,
                    "keterangan" => $request->keterangan,
                    "lampiran" => $nama,
                ]);
                $request->file('lampiran')->storeAs('DataKelas/Feed/'.$hasil->feed_id,$nama_file, 'local');
            }else{
                $hasil = Feed::create([
                    "kelas_id" => $dataKelas->kelas_id,
                    "pengguna_id" => $dataUser->pengguna_id,
                    "keterangan" => $request->keterangan,
                    "lampiran" => "kosong",
                ]);
            }

        }
        return back();
    }

    public function doAddComment(Request $request)
    {
        $comment = $request->comment;
        $kelas_id = $request->kelas_id;
        $feed_id = $request->feed_id;
        $pengguna =  Auth::guard('satpam_pengguna')->user();
        if ($feed_id && $pengguna->pengguna_id && $comment) {
            $hasil = Comment::create([
                'feed_id' => $feed_id,
                'pengguna_id' => $pengguna->pengguna_id,
                'keterangan' => $comment,
            ]);
        }

        return back();
    }
    public function downloadlampiranfeed(Request $request)
    {
        $register = Feed::find($request->id);
        return Storage::disk('local')->download("DataKelas/Feed/$request->id/$register->lampiran");
    }
}
