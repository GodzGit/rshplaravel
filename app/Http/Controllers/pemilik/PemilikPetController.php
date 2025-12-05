<?php

namespace App\Http\Controllers\pemilik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikPetController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pemilik = DB::table('pemilik')->where('iduser', $user->iduser)->first();

        $pet = DB::table('pet as p')
            ->leftJoin('ras_hewan as r', 'p.idras_hewan', '=', 'r.idras_hewan')
            ->where('p.idpemilik', $pemilik->idpemilik)
            ->select('p.*', 'r.nama_ras')
            ->get();

        return view('pemilik.pet.index', compact('pet'));
    }

    public function show($id)
    {
        $pet = DB::table('pet as p')
            ->leftJoin('ras_hewan as r', 'p.idras_hewan', '=', 'r.idras_hewan')
            ->where('p.idpet', $id)
            ->select('p.*', 'r.nama_ras')
            ->first();

        if (!$pet) return back()->with('error', 'Data pet tidak ditemukan.');

        return view('pemilik.pet.show', compact('pet'));
    }
}
