<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;


class ResepsionisTemuDokterController extends Controller
{
    public function index()
    {
        $temu = TemuDokter::with(['pet'])->get();
        return view('resepsionis.TemuDokter.index', compact('temu'));
    }

    public function create()
    {
        $pet = Pet::with('pemilik')->get();
        return view('resepsionis.TemuDokter.create', compact('pet'));
    }

    public function store(Request $request)
    {
        TemuDokter::create([
            'idpet' => $request->idpet,
            'no_urut' => TemuDokter::max('no_urut') + 1,
            'status' => '0',
        ]);

        return redirect()->route('resepsionis.temu-dokter')
            ->with('success', 'Temu Dokter berhasil ditambahkan!');
    }
}
