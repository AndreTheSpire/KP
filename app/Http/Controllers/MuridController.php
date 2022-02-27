<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function GotoHome()
    {
        return view("pages.Murid.home");
    }
}
