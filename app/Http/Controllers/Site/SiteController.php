<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function beranda()
    {
        return view('site.beranda');
    }

    public function struktur()
    {
        return view('site.struktur');
    }

    public function layanan()
    {
        return view('site.layanan');
    }

    public function visi()
    {
        return view('site.visi');
    }

    public function login()
    {
        return view('site.login');
    }
}
