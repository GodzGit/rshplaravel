<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriKlinis;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = KategoriKlinis::all();
        return view('admin.kategoriKlinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.KategoriKlinis.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateKategoriKlinis($request);

        $this->createKategoriKlinis($validatedData);

        return redirect()->route('admin.KategoriKlinis.index')
            ->with('success', 'Kategori Klinis berhasil ditambahkan.');
    }

    protected function validateKategoriKlinis(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis'
            : 'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis' => ['required', 'string', 'max:255', 'min:3', $uniqueRule]
        ], [
            'nama_kategori_klinis.required' => 'Nama Kategori Klinis wajib diisi.',
            'nama_kategori_klinis.unique' => 'Nama Kategori Klinis sudah ada.',
            'nama_kategori_klinis.max' => 'Maksimal 255 karakter.',
            'nama_kategori_klinis.min' => 'Minimal 3 karakter.',
        ]);
    }

    protected function createKategoriKlinis(array $data)
    {
        return KategoriKlinis::create([
            'nama_kategori_klinis' => $this->formatNama($data['nama_kategori_klinis']),
        ]);
    }

    protected function formatNama($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
