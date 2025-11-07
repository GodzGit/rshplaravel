<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemilik;
use App\Models\Ras;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::all();
        return view('admin.pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik = Pemilik::with('user')->get();
        $ras = Ras::with('jenisHewan')->get();

        return view('admin.Pet.create', compact('pemilik', 'ras'));
    }

    public function store(Request $request)
    {
        $data = $this->validatePet($request);

        $this->createPet($data);

        return redirect()
            ->route('admin.Pet.index')
            ->with('success', 'Pet berhasil ditambahkan!');
    }

    /* ========== VALIDASI ========== */
    protected function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ], [
            'nama.required' => 'Nama pet wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'warna_tanda.required' => 'Warna/tanda wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'idpemilik.required' => 'Pemilik wajib dipilih.',
            'idras_hewan.required' => 'Ras hewan wajib dipilih.',
        ]);
    }

    /* ========== HELPER ========== */
    protected function createPet(array $data)
    {
        return Pet::create([
            'nama' => trim(ucwords(strtolower($data['nama']))),
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda' => trim($data['warna_tanda']),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik' => $data['idpemilik'],
            'idras_hewan' => $data['idras_hewan'],
        ]);
    }
}
