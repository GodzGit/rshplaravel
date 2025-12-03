<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\Pemilik;


class ResepsionisTemuDokterController extends Controller
{
    public function index()
    {
        $temu = TemuDokter::with(['pet'])->get();
        return view('resepsionis.TemuDokter.index', compact('temu'));
    }

    public function create()
    {
        $pemilik = Pemilik::with('pets')->get();

        return view('resepsionis.temudokter.create', compact('pemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpemilik' => 'required',
            'idpet' => 'required',
            'waktu_daftar' => 'required',
        ]);

        TemuDokter::create([
            'idpemilik' => $request->idpemilik,
            'idpet' => $request->idpet,
            'waktu_daftar' => $request->waktu_daftar,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('resepsionis.TemuDokter.index')
            ->with('success', 'Temu dokter berhasil ditambahkan!');
    }
}
