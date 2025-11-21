<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateKategori($request);

        DB::table('kategori')->insert([
            'nama_kategori' => ucwords(strtolower($data['nama_kategori'])),
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')
            ->where('idkategori', $id)
            ->first();

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateKategori($request, $id);

        DB::table('kategori')
            ->where('idkategori', $id)
            ->update([
                'nama_kategori' => ucwords(strtolower($data['nama_kategori'])),
            ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kategori')->where('idkategori', $id)->delete();

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    // =======================
    // VALIDATOR
    // =======================
    protected function validateKategori(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:kategori,nama_kategori,' . $id . ',idkategori'
            : 'unique:kategori,nama_kategori';

        return $request->validate([
            'nama_kategori' => ['required', 'string', 'min:3', 'max:100', $uniqueRule],
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi.',
            'nama_kategori.unique'   => 'Kategori sudah ada.',
            'nama_kategori.min'      => 'Minimal 3 karakter.',
            'nama_kategori.max'      => 'Maksimal 100 karakter.',
        ]);
    }
}
