<?php

namespace App\Http\Controllers\resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\User;
use App\Models\Ras;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class ResepsionisPendaftaranController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::with(['user', 'pet'])->get();
        return view('resepsionis.pendaftaran.index', compact('pemilik'));
    }

    public function createPemilik()
    {
        return view('resepsionis.pendaftaran.create-pemilik');
    }

    public function storePemilik(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'no_wa' => 'required',
        ]);

        // 1. buat user baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 2. buat pemilik
        DB::table('pemilik')->insert([
            'iduser' => $user->iduser,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
        ]);

        return redirect()->route('resepsionis.Pendaftaran.index')
            ->with('success', 'Pemilik berhasil ditambahkan');
    }

    public function createPet()
    {
        $pemilik = Pemilik::with('user')->orderBy('idpemilik')->get();
        $ras = Ras::with('jenisHewan')->orderBy('nama_ras')->get();

        return view('resepsionis.Pendaftaran.create-pet', compact('pemilik', 'ras'));
    }

    public function storePet(Request $request)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda'   => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik'     => 'required|exists:pemilik,idpemilik',
            'idras_hewan'   => 'required|exists:ras_hewan,idras_hewan',
        ]);

        Pet::create([
            'nama'          => $data['nama'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda'   => $data['warna_tanda'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik'     => $data['idpemilik'],
            'idras_hewan'   => $data['idras_hewan'],
        ]);

        return redirect()
            ->route('resepsionis.Pendaftaran.index')
            ->with('success', 'Pet berhasil didaftarkan!');
    }
}
