<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\TemuDokter;
use App\Models\Pemilik;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
            'idpet' => 'required|exists:pet,idpet',
        ]);

        // tanggal hari ini
        $today = Carbon::today();

        // ambil no urut terakhir hari ini
        $lastNoUrut = DB::table('temu_dokter')
            ->whereDate('waktu_daftar', $today)
            ->max('no_urut');

        // tentukan no urut baru
        $noUrutBaru = $lastNoUrut ? $lastNoUrut + 1 : 1;

        // insert antrian
        DB::table('temu_dokter')->insert([
            'no_urut'       => $noUrutBaru,
            'idpet'         => $request->idpet,
            'status'        => 0, // menunggu
            'waktu_daftar'  => Carbon::now(),
        ]);

        return redirect()
            ->route('resepsionis.TemuDokter.index')
            ->with('success', 'Antrian berhasil ditambahkan');
    }

    public function markDone($id)
    {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->update(['status' => 1]);

        return back()->with('success', 'Antrian telah ditandai Selesai.');
    }

    public function destroy($id)
    {
        DB::table('temu_dokter')
            ->where('idreservasi_dokter', $id)
            ->delete();

        return back()->with('success', 'Antrian berhasil dibatalkan.');
    }

}
