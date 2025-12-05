<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikRekamMedisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemilik = DB::table('pemilik')->where('iduser', $user->iduser)->first();

        $rekam = DB::table('rekam_medis as r')
            ->join('temu_dokter as t', 'r.idreservasi_dokter', '=', 't.idreservasi_dokter')
            ->join('pet as p', 't.idpet', '=', 'p.idpet')
            ->leftJoin('dokter as d', 'r.dokter_pemeriksa', '=', 'd.iddokter')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->select('r.*', 'p.nama as nama_pet', 'd.iddokter')
            ->get();

        return view('pemilik.rekam.index', compact('rekam'));
    }

    public function detail($id)
    {
        $rekam = DB::table('rekam_medis')->where('idrekam_medis', $id)->first();

        $detail = DB::table('detail_rekam_medis as d')
            ->leftJoin('kode_tindakan_terapi as k','d.idkode_tindakan_terapi','k.idkode_tindakan_terapi')
            ->where('d.idrekam_medis', $id)
            ->select('d.*', 'k.kode', 'k.deskripsi_tindakan_terapi')
            ->get();

        return view('pemilik.rekam.detail', compact('rekam','detail'));
    }
}
