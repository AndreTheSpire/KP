<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Comment;
use App\Models\D_tugas;
use App\Models\Feed;
use App\Models\Guru;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Notifikasi;
use App\Models\Pelajaran;
use App\Models\PendaftaranMurid;
use App\Models\Reply;
use App\Models\Tugas;
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
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataFeed=Feed::whereIn('kelas_id',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datakelasmurid=PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        return view("pages.Murid.home",[
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "datasebagaimurid"=> $datasebagaimurid,
            "dataFeed"=>$dataFeed,
        ]);
    }
    public function GotoNotifikasi()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        return view("pages.Murid.Notifikasi",[
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "datasebagaimurid"=> $datasebagaimurid,
        ]);
    }
    public function GotoPembayaran()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "semua",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
        ]);
    }
    public function GotoPembayaransemua()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->get();
        $dataPelajaran = Pelajaran::get();
        // dd($datapendaftaran);
        return view("pages.Murid.pembayaran",[
            'title' => "semua",
            "datapendaftaran" => $datapendaftaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaransearch(Request $request)
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        if($request->tipe=="semua"){
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_id','like', '%'.$request->search.'%')->get();
        }else if($request->tipe=="belum"){
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',-1)->where('pendaftaranmurid_id','like', '%'.$request->search.'%')->get();
        }else if($request->tipe=="menunggu"){
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',0)->where('pendaftaranmurid_id','like', '%'.$request->search.'%')->get();
        }else if($request->tipe=="sukses"){
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','>=',2)->where('pendaftaranmurid_id','like', '%'.$request->search.'%')->get();
        }else if($request->tipe=="gagal"){
            $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',1)->where('pendaftaranmurid_id','like', '%'.$request->search.'%')->get();
        }



        $dataPelajaran = Pelajaran::get();
        // dd($datapendaftaran);
        return view("pages.Murid.pembayaran",[
            'title' => $request->tipe,
            "datapendaftaran" => $datapendaftaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaranbelum()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',-1)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "belum",
            "datapendaftaran" => $datapendaftaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaranmenunggu()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',0)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "menunggu",
            "datapendaftaran" => $datapendaftaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GotoPembayaransukes()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','>=',2)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "sukses",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
        ]);
    }
    public function GotoPembayarangagal()
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $datapendaftaran = PendaftaranMurid::where('pengguna_id','=',$iduser)->where('pendaftaranmurid_status','=',1)->get();
        $dataPelajaran = Pelajaran::get();

        return view("pages.Murid.pembayaran",[
            'title' => "gagal",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
        ]);
    }
    public function GotoDetailPembayaran(Request $request)
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datadetail = PendaftaranMurid::find($request->id);
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataPelajaran = Pelajaran::get();
        // dd($waktuMulaiEdited);
        // dd($waktuSelesaiEdited);
        return view('pages.Murid.detailpembayaran', [
            'title' => "zonk",
            'datadetail'=>$datadetail,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
        ]);
    }
    public function Gokirimbuktitfd(Request $request)
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
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
                "dataNotifikasi"=>$dataNotifikasi,
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
                "dataNotifikasi"=>$dataNotifikasi,
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

    public function GoToKelas()
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataMurid = Murid::where('pengguna_id','=',$iduser)->get();
        $dataPelajaran = Pelajaran::get();
        return view("pages.Murid.kelas",[
            'title' => "Penetapan",
            "dataMurid" => $dataMurid,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
        ]);

    }
    public function GoDetailKelas(Request $request)
    {


        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataFeed=Feed::where('kelas_id','=',$request->id)->orderBy('feed_id', 'desc')->get();
        $dataKelas = Kelas::find($request->id);
        $dataGuru = Guru::where('pelajaran_id','=',$dataKelas->pelajaran_id)->get();;
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Murid.DetailKelas",[
            'title' => "post",
            "dataKelas"=>$dataKelas,
            "dataNotifikasi"=>$dataNotifikasi,
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
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $dataTugas=Tugas::where('kelas_id','=',$request->id)->where('tanggat_waktu','>=',Carbon::now())->orderBy('created_at', 'desc')->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Murid.tugas",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataTugas"=>$dataTugas,
        ]);
    }
    public function GoNilaiKelas(Request $request)
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $daftarabsensiid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarabsensiid[]=$murid->murid_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataTugas=Tugas::where('kelas_id','=',$request->id)->get();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $daftartugaskelas=[];
        foreach ($dataTugas as $tugas) {
            $daftartugaskelas[]=$tugas->tugas_id;
        }
        $dataTugasmurid=D_tugas::whereIn('tugas_id',$daftartugaskelas)->whereIn('murid_id',$daftarabsensiid)->get();
        return view("pages.Murid.Nilai",[
            'title' => "nilai",
            "dataKelas"=>$dataKelas,
            "dataKategori" => $dataKategori,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
            "dataTugasmurid"=>$dataTugasmurid,
        ]);
    }

    public function GoAbsensiKelas(Request $request)
    {
        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarabsensiid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarabsensiid[]=$murid->murid_id;
        }
        $dataAbsensi=Absensi::where('kelas_id','=',$request->id)->whereIn('murid_id',$daftarabsensiid)->get();
        return view("pages.Murid.Absensi",[
            'title' => "absensi",
            "dataKelas"=>$dataKelas,
            "dataKategori" => $dataKategori,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataPelajaran" => $dataPelajaran,
            "dataAbsensi"=>$dataAbsensi,
        ]);
    }

    public function GoToDo(Request $request)
    {

        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        foreach ($datasebagaimurid as $murid) {
            $daftartugasid[]=$murid->murid_id;
        }
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $dataTugas=D_Tugas::whereIn('murid_id',$daftartugasid)->orderBy('created_at', 'desc')->get();
        return view("pages.Murid.todo",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataTugas"=>$dataTugas,
        ]);
    }
    public function GoDetailTugasKelas(Request $request)
    {


        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataUser =  Auth::guard('satpam_pengguna')->user();

        foreach ($dataUser->AdalahMurid as $usermurid) {
            if($usermurid->kelas_id==$request->id){
                $muridkelas=$usermurid;
            }
        };

        $dataTugas=D_tugas::where('tugas_id','=',$request->id_tugas)->where('murid_id','=',$muridkelas->murid_id)->first();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataKelas = Kelas::find($request->id);
        $detailTugas= Tugas::find($request->id_tugas);
        $tanggatwaktutampilan = date('d-m-Y H:i', strtotime($detailTugas->tanggat_waktu));
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Murid.detailtugas",[
            'title' => "tugas",
            "dataKelas"=>$dataKelas,
            "tanggatwaktutampilan"=>$tanggatwaktutampilan,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataTugas"=>$dataTugas,
            "detailTugas"=>$detailTugas
        ]);
    }

    public function GoDetailMemberKelas(Request $request)
    {


        $iduser=Auth::guard('satpam_pengguna')->user()->pengguna_id;
        $datasebagaimurid=Murid::where('pengguna_id','=',$iduser)->get();
        $daftarkelasid=[];
        foreach ($datasebagaimurid as $murid) {
            $daftarkelasid[]=$murid->kelas_id;
        }
        $dataNotifikasi=Notifikasi::whereIn('notifikasi_kelas',$daftarkelasid)->orderBy('created_at', 'desc')->get();
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        $dataFeed=Feed::where('kelas_id','=',$request->id)->orderBy('feed_id', 'desc')->get();
        $dataKelas = Kelas::find($request->id);
        $datamurid=Murid::where('kelas_id','=',$request->id)->get();
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        return view("pages.Murid.member",[
            'title' => "member",
            "dataKelas"=>$dataKelas,
            "waktuMulaiEdited"=>$waktuMulaiEdited,
            "waktuSelesaiEdited"=>$waktuSelesaiEdited,
            "dataNotifikasi"=>$dataNotifikasi,
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
            "dataMurid"=>$datamurid,
        ]);
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
    public function doUploadTugas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);

        $user_login =  Auth::guard('satpam_pengguna')->user();
        $id_tugas=$request->id_tugas;
        $file = $request->file('file_upload');

		$nama_file = $file->getClientOriginalName();


        $request->file('file_upload')->storeAs('DataKelas/PengumpulanTugas/'.$id_tugas,$nama_file, 'local');

        $result=D_tugas::where('tugas_id','=',$id_tugas)->get();

        foreach ($result as $res) {
            if($res->PunyaMurid->pengguna_id==$user_login->pengguna_id){
                $res->url_pengumpulan=$nama_file;
                $res->save();
            }
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
    public function downloadfilebuktitf(Request $request)
    {
        $register = PendaftaranMurid::find($request->id);
        return Storage::disk('local')->download("DataRegistrasi/$register->pendaftaranmurid_buktibayar");
    }
}
