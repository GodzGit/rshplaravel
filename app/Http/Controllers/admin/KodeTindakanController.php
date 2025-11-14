<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakan;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanController extends Controller
{
    public function index()
    {
        $kodeTindakan = KodeTindakan::all();
        return view('admin.kodeTindakan.index', compact('kodeTindakan'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategoriKlinis = KategoriKlinis::all();

        return view('admin.KodeTindakan.create', compact('kategori','kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $this->createKode($data);

        return redirect()
            ->route('admin.KodeTindakan.index')
            ->with('success', 'Kode Tindakan berhasil ditambahkan.');
    }

    // ------------------ Helper & Validasi ------------------

    protected function validateData(Request $request)
        {
            return $request->validate([
                'kode' => 'required|string|max:50|unique:kode_tindakan_terapi,kode',
                'deskripsi_tindakan_terapi' => 'required|string|max:1000',
                'idkategori' => 'required|integer|exists:kategori,idkategori',
                'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
            ], [
                'kode.required' => 'Kode wajib diisi.',
                'deskripsi_tindakan_terapi.required' => 'Deskripsi tindakan wajib diisi.',
                'idkategori.required' => 'Kategori wajib dipilih.',
                'idkategori_klinis.required' => 'Kategori klinis wajib dipilih.',
            ]);
        }

        protected function createKode(array $data)
        {
            return KodeTindakan::create([
                'kode' => strtoupper(trim($data['kode'])),
                'deskripsi_tindakan_terapi' => $data['deskripsi_tindakan_terapi'],
                'idkategori' => $data['idkategori'],
                'idkategori_klinis' => $data['idkategori_klinis'],
            ]);
        }

}
