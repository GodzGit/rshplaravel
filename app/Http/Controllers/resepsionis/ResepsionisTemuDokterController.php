<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ResepsionisTemuDokterController extends Controller
{
    public function index()
    {
        $temu = TemuDokter::with(['pet'])->get();
        return view('resepsionis.TemuDokter.index', compact('temu'));
    }

    public function create()
    {
        $pet = \App\Models\Pet::all();
        return view('resepsionis.temuDokter.create', compact('pet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idpet' => 'required|integer',
        ]);

        $tanggal = date('Y-m-d H:i:s');

        // Nomor urut harian (reset per hari)
        $nomor = DB::table('temu_dokter')
            ->where('waktu_daftar', $tanggal)
            ->count() + 1;

        DB::table('temu_dokter')->insert([
            'idpet' => $request->idpet,
            'waktu_daftar' => $tanggal,
            'no_urut' => $nomor
        ]);

        return redirect()->route('resepsionis.TemuDokter.index')
            ->with('success', 'Antrian berhasil ditambahkan!');
    }

    public function markDone($id)
    {
        DB::table('reservasi_dokter')
            ->where('idreservasi_dokter', $id)
            ->update(['status' => 1]);

        return back()->with('success', 'Antrian telah ditandai Selesai.');
    }

    public function destroy($id)
    {
        DB::table('reservasi_dokter')
            ->where('idreservasi_dokter', $id)
            ->delete();

        return back()->with('success', 'Antrian berhasil dibatalkan.');
    }

}
