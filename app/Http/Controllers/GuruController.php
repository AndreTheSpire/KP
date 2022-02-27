<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function GotoHome()
    {
        return view("pages.Guru.home");
    }
}
