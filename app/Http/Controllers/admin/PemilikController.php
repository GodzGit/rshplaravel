<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\pemilik;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = pemilik::with('user')->get();
        return view('admin.Pemilik.index', compact('pemilik'));
    }
}
