<?php

namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisPerawatController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::with([
            'temuDokter.pet.pemilik.user'
        ])->get();

        return view('perawat.RekamMedis.index', compact('rekam'));
    }

    public function show($id)
    {
        $rm = RekamMedis::with([
            'temuDokter.pet.pemilik.user',
            'detailRekamMedis.kodeTindakan'
        ])->findOrFail($id);

        return view('perawat.RekamMedis.show', compact('rm'));
    }
}
