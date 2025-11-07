<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ras;
use App\Models\JenisHewan;

class RasController extends Controller
{
    public function index()
    {
        $ras = Ras::with('JenisHewan')->get();
        return view('admin.RasHewan.index', compact('ras'));
    }

    public function create()
    {
        $jenis = JenisHewan::all(); // dropdown jenis hewan
        return view('admin.RasHewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRasHewan($request);

        $this->createRasHewan($validated);

        return redirect()->route('admin.RasHewan.index')
            ->with('success', 'Ras Hewan berhasil ditambahkan!');
    }

    // ✅ VALIDASI (sesuai tugas modul)
    protected function validateRasHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ?
            'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan' :
            'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => ['required', 'string', 'min:3', 'max:255', $uniqueRule],
            'idjenis_hewan' => ['required', 'exists:jenis_hewan,idjenis_hewan'],
        ], [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'nama_ras.unique' => 'Nama ras sudah ada.',
            'nama_ras.min' => 'Nama ras minimal 3 karakter.',
            'idjenis_hewan.required' => 'Jenis hewan wajib dipilih.',
        ]);
    }

    // ✅ HELPER (sesuai modul)
    protected function createRasHewan($data)
    {
        return Ras::create([
            'nama_ras' => $this->formatStr($data['nama_ras']),
            'idjenis_hewan' => $data['idjenis_hewan'],
        ]);
    }

    protected function formatStr($str)
    {
        return trim(ucwords(strtolower($str)));
    }
}
