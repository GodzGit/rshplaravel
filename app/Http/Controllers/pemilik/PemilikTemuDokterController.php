<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikTemuDokterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemilik = DB::table('pemilik')->where('iduser', $user->iduser)->first();

        $temu = DB::table('temu_dokter as t')
            ->join('pet as p', 't.idpet', '=', 'p.idpet')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->select('t.*', 'p.nama as nama_pet')
            ->orderBy('t.waktu_daftar', 'desc')
            ->get();

        return view('pemilik.temu.index', compact('temu'));
    }
}
