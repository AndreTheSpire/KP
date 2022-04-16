<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\KategoriKelas;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\PendaftaranMurid;
use App\Models\Pengguna;
use App\Notifications\NotifikasiiPenerimaan;
use App\Notifications\NotifikasiWawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function GoToAdmin()
    {
        return view("pages.admin.home",[
            'title' => "Home"
        ]);

    }
    public function GoToPelajaranKelas()
    {
        $dataPelajaran = Pelajaran::get();
        return view("pages.admin.PelajaranKelas",[
            'title' => "pelajaran",
            "dataPelajaran" => $dataPelajaran,
        ]);

    }

    public function DoTambahPelajaran(Request $request)
    {
        /**
         * Kodingan kodingan untuk kelas code
         */
        $request->validate([
            'pelajaran_nama'=>'required',
        ],[
            'pelajaran_nama.required'=>'kolom ini tidak boleh kosong',
        ]);


        $hasil = Pelajaran::create($request->all());
        if ($hasil) {
            Alert::success('Succes', 'berhasil menambah pelajaran kelas');
            return back();
        } else {
            Alert::success('Succes', 'gagal menambah pelajaran kelas');
            return back();
        }

    }

    public function DoDeletePelajaran($id)
    {
        try {
            $check = Pelajaran::where('pelajaran_id',$id)->delete();
            $check1 = KategoriKelas::where('pelajaran_id',$id)->delete();
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        $dataPelajaran = Pelajaran::get();
        return view("pages.admin.PelajaranKelas",[
            'title' => "pelajaran",
            "dataPelajaran" => $dataPelajaran,
        ]);
    }

    public function DoTambahKategori(Request $request)
    {
        /**
         * Kodingan kodingan untuk kelas code
         */
        $request->validate([
            'kategorikelas_nama'=>'required',
        ],[
            'kategorikelas_nama.required'=>'kolom ini tidak boleh kosong',
        ]);


        $hasil = KategoriKelas::create($request->all());
        if ($hasil) {
            Alert::success('Succes', 'berhasil menambah Kategori Pelajaran');
            return back();
        } else {
            Alert::success('Succes', 'gagal menambah Kategori Pelajaran');
            return back();
        }

    }

    public function DoDeleteKategori($id)
    {
        try {
            $check = KategoriKelas::where('kategorikelas_id',$id)->delete();
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        return view("pages.admin.KategoriKelas",[
            'title' => "kategori",
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }

    public function GoToKategoriKelas()
    {
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        return view("pages.admin.KategoriKelas",[
            'title' => "kategori",
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
        ]);

    }
    public function GoToPembuatanDanPenetapanKelas()
    {
        $dataKelas = Kelas::get();
        return view("pages.admin.PembuatanDanPenetapanKelas",[
            'title' => "Penetapan",
            "dataKelas" => $dataKelas,
        ]);

    }
    public function GoToBuatKelas()
    {
        $dataPelajaran = Pelajaran::get();
        $dataKategori = KategoriKelas::get();
        return view("pages.admin.PembuatanKelas",[
            'title' => "Penetapan",
            "dataKategori" => $dataKategori,
            "dataPelajaran" => $dataPelajaran,
        ]);

    }
    public function DoUpdatekelas(Request $request)
    {
        $request->validate([
            'kelas_nama'=>'required',
            'kelas_deskripsi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required|after:waktu_mulai',
        ],[
            'kelas_nama.required'=>'kolom ini tidak boleh kosong',
            'kelas_deskripsi.required'=>'kolom ini tidak boleh kosong',
            'waktu_mulai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.after'=>'kolom ini tidak boleh sebelum waktu mulai',
        ]);

        $id=$request->id_kelas;
        $kelasupdate=Kelas::find($id);
        $kelasupdate->kelas_nama=$request->kelas_nama;
        $kelasupdate->pengguna_id=$request->guru_kelas;
        $kelasupdate->waktu_mulai=$request->waktu_mulai;
        $kelasupdate->waktu_selesai=$request->waktu_selesai;
        $kelasupdate->save();
        $pengguna_id =0;
        if ($kelasupdate) {
            Alert::success('Succes', 'berhasil mengupdate kelas');
            return back();
        } else {
            Alert::success('Succes', 'gagal mengupdate kelas');
            return back();
        }

    }
    public function GoDetailKelas(Request $request)
    {
        $dataKelas = Kelas::find($request->id);
        $dataGuru = Guru::where('pelajaran_id','=',$dataKelas->pelajaran_id)->get();;
        $waktuMulaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_mulai));
        $waktuSelesaiEdited = date('Y-m-d\TH:i', strtotime($dataKelas->waktu_selesai));
        // dd($waktuMulaiEdited);
        // dd($waktuSelesaiEdited);
        $params['dataKelas'] = $dataKelas;
        $params['waktuMulaiEdited'] = $waktuMulaiEdited;
        $params['waktuSelesaiEdited'] = $waktuSelesaiEdited;
        $params['dataGuru'] = $dataGuru;
        $params['title']="Penetapan";
        return view('pages.admin.DetailKelas', $params);
    }

    public function DoBuatKelas(Request $request)
    {
        /**
         * Kodingan kodingan untuk kelas code
         */
        $request->validate([
            'kelas_nama'=>'required',
            'kelas_deskripsi'=>'required',
            'waktu_mulai'=>'required',
            'waktu_selesai'=>'required|after:waktu_mulai',
        ],[
            'kelas_nama.required'=>'kolom ini tidak boleh kosong',
            'kelas_deskripsi.required'=>'kolom ini tidak boleh kosong',
            'waktu_mulai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.required'=>'kolom ini tidak boleh kosong',
            'waktu_selesai.after'=>'kolom ini tidak boleh sebelum waktu mulai',
        ]);

        $length = 6;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        $kelas_kode = implode('', $pieces);


        $pengguna_id =$request->guru_kelas;
        $kelas_nama = explode(' ', $request->kelas_nama);
        $hasil = Kelas::create($request->all() + ['pengguna_id' => $pengguna_id, 'kelas_kode' => $kelas_kode, 'status' => true]);
        if ($hasil) {
            Alert::success('Succes', 'berhasil menambah kelas');
            return back();
        } else {
            Alert::success('Succes', 'gagal menambah kelas');
            return back();
        }


    }
    public function GoToPenerimaanCVGuru()
    {
        $data_guru = Pengguna::where('pengguna_status_CV','=','0')->where('pengguna_status_wawancara','=','0')->get();
        return view("pages.admin.PenerimaanCVGuru",[
            'title' => "PenerimaanCVGuru",
            'data_guru' => $data_guru
        ]);

    }
    public function GoToPenerimaanWawancaraGuru()
    {
        $data_guru = Pengguna::where('pengguna_status_CV','=','1')->where('pengguna_status_wawancara','=','0')->get();

        return view("pages.admin.PenerimaanWawancaraGuru",[
            'title' => "PenerimaanWawancaraGuru",
            'data_guru' => $data_guru,
        ]);

    }
    public function GoToDetailPenerimaanWawancaraGuru(Request $req)
    {
        // dd($req->id);
        $data_detail = Pengguna::find($req->id);
        $data_pelajaran= Pelajaran::get();
        // dd($data_detail);
        return view("pages.admin.DetailPenerimaanWawancaraGuru",[
            'title' => "DetailPenerimaanGuru",
            "data_detail" => $data_detail,
            'data_pelajaran'=>$data_pelajaran
        ]);

    }
    public function GoToDetailPenerimaanCVGuru(Request $req)
    {
        // dd($req->id);
        $data_detail = Pengguna::find($req->id);
        // dd($data_detail);
        return view("pages.admin.DetailPenerimaanCVGuru",[
            'title' => "DetailPenerimaanGuru",
            "data_detail" => $data_detail
        ]);

    }
    public function ConfirmCVGuru(Request $req)
    {
        $waktuWawancara = date('d-m-Y\TH:i', strtotime($req->waktu_wawancara));
        $splitedWaktu = explode("T", $waktuWawancara);
        $gabungSplited = $splitedWaktu[0]." ".$splitedWaktu[1];
        // dd($waktuWawancara);
        $data_confirm = Pengguna::find($req->id);
        $data_confirm->pengguna_status_CV = '1';
        $data_confirm->save();
        $data_guru = Pengguna::where('pengguna_status_CV','=','0','and','pengguna_status_wawancara','=','0')->get();
        Notification::send($data_confirm, new NotifikasiWawancara($data_confirm,$req->zoom_link,true,$gabungSplited));
        return view("pages.admin.PenerimaanCVGuru",[
            'title' => "PenerimaanCVGuru",
            'data_guru' => $data_guru
        ]);

    }
    public function DeclineCVGuru(Request $req)
    {
        $data_confirm = Pengguna::find($req->id);
        $data_confirm->pengguna_status_CV = '-1';
        $data_confirm->save();
        $data_guru = Pengguna::where('pengguna_status_CV','=','0','and','pengguna_status_wawancara','=','0')->get();
        Notification::send($data_confirm, new NotifikasiWawancara($data_confirm,"www.andre.com",false,$req->waktu_wawancara));
        return view("pages.admin.PenerimaanCVGuru",[
            'title' => "PenerimaanCVGuru",
            'data_guru' => $data_guru
        ]);
    }
    public function ConfirmWawancaraGuru(Request $req)
    {
        $data_confirm = Pengguna::find($req->id);
        $data_confirm->pengguna_status_wawancara = '1';
        $data_confirm->save();
        $hasil=Guru::create([
            'kelas_id'=>0,
            'pengguna_id'=>$req->id,
            'pelajaran_id'=>$req->pelajaran_id,
        ]);
        $data_guru = Pengguna::where('pengguna_status_CV','=','0','and','pengguna_status_wawancara','=','0')->get();
        Notification::send($data_confirm, new NotifikasiiPenerimaan($data_confirm,true));
        return view("pages.admin.PenerimaanWawancaraGuru",[
            'title' => "PenerimaanWawancaraGuru",
            'data_guru' => $data_guru
        ]);
    }
    public function DeclineWawancaraGuru(Request $req)
    {
        $data_confirm = Pengguna::find($req->id);
        $data_confirm->pengguna_status_wawancara = '-1';
        $data_confirm->save();

        $data_guru = Pengguna::where('pengguna_status_CV','=','0','and','pengguna_status_wawancara','=','0')->get();
        Notification::send($data_confirm, new NotifikasiiPenerimaan($data_confirm,false));
        return view("pages.admin.PenerimaanWawancaraGuru",[
            'title' => "PenerimaanWawancaraGuru",
            'data_guru' => $data_guru
        ]);
    }
    public function GoToPenerimaanMurid()
    {
        $datapendaftaran = PendaftaranMurid::get();
        $dataPelajaran = Pelajaran::get();
        // dd($datapendaftaran);
        return view("pages.admin.PenerimaanMurid",[
            'title' => "PenerimaanMurid",
            "datapendaftaran" => $datapendaftaran,
            "dataPelajaran" => $dataPelajaran,
        ]);

    }
    public function GoToDetailPenerimaanMurid(Request $request)
    {
        $datadetail = PendaftaranMurid::find($request->id);
        $dataPelajaran = Pelajaran::get();
        // dd($waktuMulaiEdited);
        // dd($waktuSelesaiEdited);
        return view('pages.admin.detailpembayaran', [
            'title' => "zonk",
            'datadetail'=>$datadetail,
            "dataPelajaran" => $dataPelajaran,
        ]);
    }
    public function GoToLaporanTransaksi()
    {
        return view("pages.admin.LaporanTransaksi",[
            'title' => "LaporanTransaksi"
        ]);

    }
    public function downloadfileCV(Request $request)
    {
        $user = Pengguna::find($request->id);
        return Storage::disk('local')->download("DataUser/$user->pengguna_CV_KTP");
    }

}
