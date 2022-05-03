<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\D_tugas;
use App\Models\Feed;
use App\Models\Guru;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Pelajaran;
use App\Models\Reply;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class GuruController extends Controller
{
    public function GotoHome()
    {
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $idguruuser=Auth::guard('satpam_pengguna')->user()->adalahGuru->guru_id;
        $datasebagaiguru=Kelas::where('guru_id','=',$idguruuser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaiguru as $guru) {
            $daftarkelasid[]=$guru->kelas_id;
        }
        $dataFeed=Feed::whereIn('kelas_id',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        return view("pages.Guru.home",[
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "datasebagaiguru"=> $datasebagaiguru,
            "dataFeed"=>$dataFeed,
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
        $dataFeed=Feed::where('kelas_id','=',$request->id)->orderBy('feed_id', 'desc')->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.DetailKelas",[
            'title' => "post",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataFeed"=>$dataFeed,
        ]);
    }
    public function GoTugasKelas(Request $request)
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $dataTugas=Tugas::where('kelas_id','=',$request->id)->orderBy('created_at', 'desc')->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.tugas",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataTugas"=>$dataTugas,
        ]);
    }
    public function GoDetailTugasKelas(Request $request)
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $detailTugas= Tugas::find($request->id_tugas);
        $dataTugas= D_Tugas::where('tugas_id','=',$request->id_tugas)->get();
        $tanggatwaktu = date('Y-m-d\TH:i', strtotime($detailTugas->tanggat_waktu));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.detailtugas",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "tanggatwaktu"=>$tanggatwaktu,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataTugas"=>$dataTugas,
            "detailTugas"=>$detailTugas
        ]);
    }
    public function doDeleteTugas(Request $request)
    {
        $dataTugas = Tugas::find($request->idtugas);
        $dataTugas->delete();

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $dataTugas=Tugas::where('kelas_id','=',$request->id)->orderBy('created_at', 'desc')->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.tugas",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataTugas"=>$dataTugas,
        ]);
    }
    public function GoDetailMemberKelas(Request $request)
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $datamurid=Murid::where('kelas_id','=',$request->id)->get();
        $dataFeed=Feed::where('kelas_id','=',$request->id)->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Guru.member",[
            'title' => "member",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataMurid"=>$datamurid,
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
    public function doUpdateFeed(Request $request)
    {
        $dataUser = Auth::guard('satpam_pengguna')->user();
        $nama_file="kosong";
        $file = $request->file('lampiran');
        $dataFeed = Feed::find($request->idfeed);
        // dd($dataFeed);

            if($file){
                $nama_file = $file->getClientOriginalName();

                $nama=$nama_file;

                $dataFeed->keterangan=$request->keterangan;
                $dataFeed->lampiran=$nama;
                $dataFeed->save();
                $request->file('lampiran')->storeAs('DataKelas/Feed/'.$request->idfeed,$nama_file, 'local');
            }else{
                $dataFeed->keterangan=$request->keterangan;
                $dataFeed->save();
            }

        return back();
    }
    public function doDeleteFeed(Request $request)
    {
        $dataFeed = Feed::find($request->idfeed);
        $dataFeed->delete();
        return back();
    }

    public function doAddComment(Request $request)
    {
        $comment = $request->comment;
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
    public function doAddTugasKelas(Request $request)
    {
        $dataUser = Auth::guard('satpam_pengguna')->user();
        $nama_file="kosong";
        $file = $request->file('lampiran');
        $dataKelas = Kelas::find($request->id);
        if ($request->tugas_nama && $request->tanggat_waktu && $request->tugas_keterangan) {
            if($file){
                $nama_file = $file->getClientOriginalName();
                $nama=$nama_file;
                $hasil = Tugas::create([
                    'kelas_id' => $request->id,
                    'pengguna_id'=>$dataUser->pengguna_id,
                    'tugas_nama' => $request->tugas_nama,
                    'tanggat_waktu'=>$request->tanggat_waktu,
                    'tugas_keterangan' => $request->tugas_keterangan,
                    "lampiran"=>$nama,
                    "status"=>0,
                ]);
                $request->file('lampiran')->storeAs('DataKelas/Tugas/'.$hasil->tugas_id,$nama_file, 'local');
            }else{
                $hasil = Tugas::create([
                    'kelas_id' => $request->id,
                    'pengguna_id'=>$dataUser->pengguna_id,
                    'tugas_nama' => $request->tugas_nama,
                    'tanggat_waktu'=>$request->tanggat_waktu,
                    'tugas_keterangan' => $request->tugas_keterangan,
                    "lampiran" => "kosong",
                    "status"=>0,
                ]);
            }
            $kelastugas=$hasil->kelas_id;
            $data_murid=Murid::where('kelas_id','=',$kelastugas)->get();

            foreach ($data_murid as $murid) {
                $tugasdibagi=D_tugas::create([
                    "tugas_id"=>$hasil->tugas_id,
                    "murid_id"=>$murid->murid_id,
                    "nilai"=>0,
                ]);

            }

        }
        return back();
    }

    public function doUpdateTugasKelas(Request $request)
    {

        $dataUser = Auth::guard('satpam_pengguna')->user();
        $nama_file="kosong";
        $file = $request->file('lampiran');
        $dataTugas = Tugas::find($request->idtugas);

            if($file){
                $nama_file = $file->getClientOriginalName();

                $nama=$nama_file;

                $dataTugas->tugas_nama=$request->tugas_nama;
                $dataTugas->tanggat_waktu=$request->tanggat_waktu;
                $dataTugas->tugas_keterangan=$request->tugas_keterangan;
                $dataTugas->lampiran=$nama;
                $dataTugas->save();
                $request->file('lampiran')->storeAs('DataKelas/Tugas/'.$request->idtugas,$nama_file, 'local');
            }else{
                $dataTugas->tugas_nama=$request->tugas_nama;
                $dataTugas->tanggat_waktu=$request->tanggat_waktu;
                $dataTugas->tugas_keterangan=$request->tugas_keterangan;
                $dataTugas->save();
            }

        return back();

    }

    public function doAddReply(Request $request)
    {
        $user_logged =  Auth::guard('satpam_pengguna')->user();
        $keterangan = $request->keterangan;
        $comment_id = $request->comment_id;
        $pengguna_id = $user_logged->pengguna_id;
        //TODO add reply ke table reply ambil
        if ($comment_id && $pengguna_id && $keterangan) {
            $hasil = Reply::create([
                'comment_id' => $comment_id,
                'pengguna_id' => $pengguna_id,
                'keterangan' => $keterangan,
            ]);
        }
        return back();
    }
    public function downloadlampiranfeed(Request $request)
    {
        $register = Feed::find($request->id);
        return Storage::disk('local')->download("DataKelas/Feed/$request->id/$register->lampiran");
    }
    public function downloadlampirantugas(Request $request)
    {
        $register = Tugas::find($request->id);
        return Storage::disk('local')->download("DataKelas/Tugas/$request->id/$register->lampiran");
    }
}
