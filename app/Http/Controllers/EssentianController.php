<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssentianController extends Controller
{
    public function GoToLogin()
    {
        return view("pages.essential.login");
    }
    public function GoToRegister()
    {
        return view("pages.essential.Register");
    }
}
