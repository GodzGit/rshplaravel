<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KodeTindakanController extends Controller
{
    public function index()
    {
        $kodeTindakan = DB::table('kode_tindakan_terapi')
            ->join('kategori', 'kategori.idkategori', '=', 'kode_tindakan_terapi.idkategori')
            ->join('kategori_klinis', 'kategori_klinis.idkategori_klinis', '=', 'kode_tindakan_terapi.idkategori_klinis')
            ->select(
                'kode_tindakan_terapi.*',
                'kategori.nama_kategori',
                'kategori_klinis.nama_kategori_klinis'
            )
            ->get();

        return view('admin.kodeTindakan.index', compact('kodeTindakan'));
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('admin.KodeTindakan.create', compact('kategori', 'kategoriKlinis'));
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        DB::table('kode_tindakan_terapi')->insert([
            'kode' => strtoupper(trim($request->kode)),
            'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
            'idkategori' => $request->idkategori,
            'idkategori_klinis' => $request->idkategori_klinis,
        ]);

        return redirect()
            ->route('admin.KodeTindakan.index')
            ->with('success', 'Kode tindakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kode = DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->first();

        $kategori = DB::table('kategori')->get();
        $kategoriKlinis = DB::table('kategori_klinis')->get();

        return view('admin.KodeTindakan.edit', compact('kode', 'kategori', 'kategoriKlinis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateData($request, $id);

        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->update([
                'kode' => strtoupper(trim($request->kode)),
                'deskripsi_tindakan_terapi' => $request->deskripsi_tindakan_terapi,
                'idkategori' => $request->idkategori,
                'idkategori_klinis' => $request->idkategori_klinis,
            ]);

        return redirect()
            ->route('admin.KodeTindakan.index')
            ->with('success', 'Kode tindakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('kode_tindakan_terapi')
            ->where('idkode_tindakan_terapi', $id)
            ->delete();

        return redirect()
            ->route('admin.KodeTindakan.index')
            ->with('success', 'Kode tindakan berhasil dihapus.');
    }

    // ========== VALIDASI (Re-usable) ==========
    protected function validateData(Request $request, $id = null)
    {
        $uniqueKode = $id
            ? 'unique:kode_tindakan_terapi,kode,' . $id . ',idkode_tindakan_terapi'
            : 'unique:kode_tindakan_terapi,kode';

        return $request->validate([
            'kode' => ['required', 'string', 'max:50', $uniqueKode],
            'deskripsi_tindakan_terapi' => 'required|string|max:1000',
            'idkategori' => 'required|integer|exists:kategori,idkategori',
            'idkategori_klinis' => 'required|integer|exists:kategori_klinis,idkategori_klinis',
        ], [
            'kode.required' => 'Kode wajib diisi.',
            'deskripsi_tindakan_terapi.required' => 'Deskripsi wajib diisi.',
            'idkategori.required' => 'Kategori wajib dipilih.',
            'idkategori_klinis.required' => 'Kategori klinis wajib dipilih.',
        ]);
    }
}
