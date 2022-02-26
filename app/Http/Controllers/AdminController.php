<?php

namespace App\Http\Controllers;

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
        return view("pages.admin.PenerimaanGuru",[
            'title' => "PenerimaanGuru"
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
