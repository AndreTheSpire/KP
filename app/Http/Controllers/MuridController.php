<?php

namespace App\Http\Controllers;

use App\Models\KategoriKelas;
use App\Models\Pelajaran;
use App\Models\PendaftaranMurid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
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
    public function GotoPembayaran()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "semua",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaransemua()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        $dataPelajaran = Pelajaran::get();
        // dd($datapendaftaran);
        return view("pages.Murid.pembayaran",[
            'title' => "semua",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaranbelum()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',-1)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "belum",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaranmenunggu()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',0)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "menunggu",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaransukes()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',1)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "sukses",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayarangagal()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',2)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "gagal",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoDetailPembayaran(Request $request)
    {
        $datadetail = PendaftaranMurid::find($request->id);
        $dataPelajaran = Pelajaran::get();
        // dd($waktuMulaiEdited);
        // dd($waktuSelesaiEdited);
        return view('pages.Murid.detailpembayaran', [
            'title' => "zonk",
            'datadetail'=>$datadetail,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function Gokirimbuktitfd(Request $request)
    {
        $datadetail = PendaftaranMurid::find($request->id);
        $nama_file="kosong";
        $file = $request->file('pendaftaranmurid_buktibayar');
        // dd($file);
        if($file==null){

            $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
            $dataPelajaran = Pelajaran::get();
            return view('pages.Murid.pembayaran', [
                'title' => "semua",
                'datapendaftaran'=>$datapendaftaran,
                "dataPelajaran" => $dataPelajaran,
            ]);
        }else{
            $nama_file = $file->getClientOriginalName();
            $request->file('pendaftaranmurid_buktibayar')->storeAs('DataRegistrasi/',$nama_file, 'local');
            $nama=$nama_file;
            $datadetail->pendaftaranmurid_buktibayar=$nama;
            $datadetail->pendaftaranmurid_status=0;
            $datadetail->save();
            $dataPelajaran = Pelajaran::get();
            // dd($waktuMulaiEdited);
            // dd($waktuSelesaiEdited);
            $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
            return view('pages.Murid.pembayaran', [
                'title' => "semua",
                'datapendaftaran'=>$datapendaftaran,
                "dataPelajaran" => $dataPelajaran,
            ]);
        }

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
        $today = Carbon::now();
        $today=$today->toDateTimeString();
        $tanggaltoday = explode(' ', $today)[0];
        $total=PendaftaranMurid::count();
        $tanggaltoday=explode('-', $tanggaltoday);
        $total=$total+1;
        $pengguna_id =$request->guru_kelas;
        $kelas_nama = explode(' ', $request->kelas_nama);
        $id=$request->pelajaran_id."".$request->kategorikelas_id."".$tanggaltoday[2].$tanggaltoday[1].$tanggaltoday[0]."".str_pad($total, 3, "0", STR_PAD_LEFT);;
        $hasil= PendaftaranMurid::create($request->all()+ ['pendaftaranmurid_id' => $id,'pendaftaranmurid_status' => -1, 'pendaftaranmurid_buktibayar' => "kosong"]);
        if ($hasil) {
            Alert::success('Succes', 'berhasil mendaftar kelas! silahkan cek halaman pembayaran untuk melengkapi pembayaran');
            return back();
        } else {
            Alert::success('Succes', 'gagal mendaftar kelas');
            return back();
        }
    }
    public function downloadfilebuktitf(Request $request)
    {
        $register = PendaftaranMurid::find($request->id);
        return Storage::disk('local')->download("DataRegistrasi/$register->pendaftaranmurid_buktibayar");
    }
}
