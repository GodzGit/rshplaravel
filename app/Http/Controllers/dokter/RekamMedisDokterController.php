<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RekamMedisDokterController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::with([
            'temuDokter.pet.pemilik',
            'detailRekamMedis.tindakan'
        ])->orderBy('created_at', 'desc')->get();

        return view('dokter.rekam.index', compact('rekam'));
    }

    // Detail rekam medis
    public function show($id)
    {
        $rekam = RekamMedis::with([
            'temuDokter.pet.pemilik',
            'detailRekamMedis.tindakan'
        ])->findOrFail($id);

        return view('dokter.rekam.show', compact('rekam'));
    }
}
