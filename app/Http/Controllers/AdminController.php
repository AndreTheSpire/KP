<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

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
    public function GoToPenerimaanGuru()
    {
        $data_guru = Pengguna::where('pengguna_status_CV','=','0','or','pengguna_status_wawancara','=','0')->get();
        return view("pages.admin.PenerimaanGuru",[
            'title' => "PenerimaanGuru",
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
}
