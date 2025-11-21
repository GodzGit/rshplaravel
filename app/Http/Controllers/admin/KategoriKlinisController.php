<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriKlinis = DB::table('kategori_klinis')->get();
        return view('admin.kategoriKlinis.index', compact('kategoriKlinis'));
    }

    public function create()
    {
        return view('admin.kategoriKlinis.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => ucwords(strtolower($data['nama_kategori_klinis'])),
        ]);

        return redirect()
            ->route('admin.KategoriKlinis.index')
            ->with('success', 'Kategori Klinis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->first();

        return view('admin.kategoriKlinis.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateData($request, $id);

        DB::table('kategori_klinis')
            ->where('idkategori_klinis', $id)
            ->update([
                'nama_kategori_klinis' => ucwords(strtolower($data['nama_kategori_klinis'])),
            ]);

        return redirect()
            ->route('admin.KategoriKlinis.index')
            ->with('success', 'Kategori Klinis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();

        return redirect()
            ->route('admin.KategoriKlinis.index')
            ->with('success', 'Kategori Klinis berhasil dihapus.');
    }

    // ========== VALIDASI ==========
    protected function validateData(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis'
            : 'unique:kategori_klinis,nama_kategori_klinis';

        return $request->validate([
            'nama_kategori_klinis' => ['required', 'string', 'min:3', 'max:255', $uniqueRule],
        ], [
            'nama_kategori_klinis.required' => 'Nama Kategori Klinis wajib diisi.',
            'nama_kategori_klinis.unique'   => 'Kategori Klinis sudah ada.',
            'nama_kategori_klinis.min'      => 'Minimal 3 karakter.',
            'nama_kategori_klinis.max'      => 'Maksimal 255 karakter.',
        ]);
    }
}
