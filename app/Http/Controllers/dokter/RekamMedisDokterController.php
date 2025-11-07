<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisDokterController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::with([
            'temuDokter.pet.pemilik.user',
        ])->get();

        return view('dokter.RekamMedis.index', compact('rekam'));
    }

    public function show($id)
    {
        $rm = RekamMedis::with([
            'temuDokter.pet.pemilik.user',
            'detailRekamMedis.kodeTindakan',
        ])->findOrFail($id);

        return view('dokter.rekam-medis.show', compact('rm'));
    }
}
