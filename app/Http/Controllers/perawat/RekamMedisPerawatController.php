<?php

namespace App\Http\Controllers\perawat;

use App\Http\Controllers\Controller;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\TemuDokter;
use App\Models\KodeTindakan;
use App\Models\DetailRekamMedis;

class RekamMedisPerawatController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::with([
            'temuDokter.pet',
            'detailRekamMedis.tindakan'
        ])->get();

        return view('perawat.rekamMedis.index', compact('rekam'));
    }

    public function create()
    {
        $temu = TemuDokter::with('pet')->get(); // ambil list pet yang daftar
        $tindakan = KodeTindakan::all();

        return view('perawat.rekamMedis.create', compact('temu', 'tindakan'));
        
    }

    public function store(Request $req)
    {
        // dd($req->all());

        $req->validate([
            'anamnesa' => 'required',
            'temuan_klinis' => 'required',
            'diagnosa' => 'nullable',
            'idreservasi_dokter' => 'required|exists:temu_dokter,idreservasi_dokter',
            'idkode_tindakan_terapi' => 'required|exists:kode_tindakan_terapi,idkode_tindakan_terapi',
            'detail' => 'nullable'
        ]);

        // 1. CREATE REKAM MEDIS
        $rekam = RekamMedis::create([
            'anamnesa' => $req->anamnesa,
            'temuan_klinis' => $req->temuan_klinis,
            'diagnosa' => $req->diagnosa,
            'idreservasi_dokter' => $req->idreservasi_dokter,
        ]);

        // 2. CREATE DETAIL TINDAKAN
        DetailRekamMedis::create([
            'idrekam_medis' => $rekam->idrekam_medis,
            'idkode_tindakan_terapi' => $req->idkode_tindakan_terapi,
            'detail' => $req->detail
        ]);

        return redirect()->route('perawat.RekamMedis.index')
            ->with('success', 'Rekam medis berhasil ditambahkan!');
    }
}
