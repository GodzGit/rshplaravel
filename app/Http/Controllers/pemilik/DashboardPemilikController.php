<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil idpemilik berdasarkan user
        $pemilik = DB::table('pemilik')->where('iduser', $user->iduser)->first();

        $jumlahPet = DB::table('pet')->where('idpemilik', $pemilik->idpemilik)->count();

        $rekamMedis = DB::table('rekam_medis as r')
            ->join('temu_dokter as t', 'r.idreservasi_dokter', '=', 't.idreservasi_dokter')
            ->join('pet as p', 't.idpet', '=', 'p.idpet')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->count();

        $temuTerbaru = DB::table('temu_dokter as t')
            ->join('pet as p', 't.idpet', '=', 'p.idpet')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->orderBy('t.waktu_daftar', 'desc')
            ->first();

        return view('pemilik.dashboardPemilik', compact('jumlahPet', 'rekamMedis', 'temuTerbaru'));
    }
}
