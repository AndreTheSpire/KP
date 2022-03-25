<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Notifications\NotifikasiiPenerimaan;
use App\Notifications\NotifikasiWawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function GoToAdmin()
    {
        return view("pages.admin.home",[
            'title' => "Home"
        ]);

    }
    public function GoToPembuatanDanPenetapanKelas()
    {
        return view("pages.admin.PembuatanDanPenetapanKelas",[
            'title' => "Penetapan"
        ]);

    }
    public function GoToBuatKelas()
    {
        return view("pages.admin.PembuatanKelas",[
            'title' => "Penetapan"
        ]);

    }
    public function DoBuatKelas()
    {
        return view("pages.admin.PembuatanDanPenetapanKelas",[
            'title' => "Penetapan"
        ]);

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
            'data_guru' => $data_guru
        ]);

    }
    public function GoToDetailPenerimaanWawancaraGuru(Request $req)
    {
        // dd($req->id);
        $data_detail = Pengguna::find($req->id);
        // dd($data_detail);
        return view("pages.admin.DetailPenerimaanWawancaraGuru",[
            'title' => "DetailPenerimaanGuru",
            "data_detail" => $data_detail
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
        $data_confirm = Pengguna::find($req->id);
        $data_confirm->pengguna_status_CV = '1';
        $data_confirm->save();
        $data_guru = Pengguna::where('pengguna_status_CV','=','0','and','pengguna_status_wawancara','=','0')->get();
        Notification::send($data_confirm, new NotifikasiWawancara($data_confirm,"www.andre.com",true));
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
        Notification::send($data_confirm, new NotifikasiWawancara($data_confirm,"www.andre.com",false));
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
        return view("pages.admin.PenerimaanMurid",[
            'title' => "PenerimaanMurid"
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
