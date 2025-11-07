<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.Kategori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateKategori($request);

        $this->createKategori($validatedData);

        return redirect()->route('admin.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    protected function validateKategori(Request $request, $id = null)
    {
        $uniqueRule = $id ?
            'unique:kategori,nama_kategori,' . $id . ',idkategori' :
            'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori' => ['required', 'string', 'min:3', 'max:100', $uniqueRule],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique' => 'Kategori sudah ada.',
            'nama_kategori.min' => 'Minimal 3 karakter.',
            'nama_kategori.max' => 'Maksimal 100 karakter.',
        ]);
    }

    protected function createKategori(array $data)
    {
        return Kategori::create([
            'nama_kategori' => $this->formatKategori($data['nama_kategori']),
        ]);
    }

    protected function formatKategori($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
