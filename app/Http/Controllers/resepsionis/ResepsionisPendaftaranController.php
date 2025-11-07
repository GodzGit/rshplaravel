<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;

class ResepsionisPendaftaranController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with(['user', 'pet'])->get();
        return view('resepsionis.pendaftaran.index', compact('pemilik'));
    }
}
