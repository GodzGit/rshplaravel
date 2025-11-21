<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function index()
    {
        $jenisHewan = DB::table('jenis_hewan')
            ->select('idjenis_hewan', 'nama_jenis_hewan')
            ->get();

        return view('admin.JenisHewan.index', compact('jenisHewan'));
    }

    public function create()
    {
        return view('admin.JenisHewan.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateJenisHewan($request);

        DB::table('jenis_hewan')->insert([
            'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
        ]);

        return redirect()->route('admin.JenisHewan.index')
            ->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }

    protected function validateJenisHewan(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan'
            : 'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan' => ['required', 'string', 'max:255', 'min:3', $uniqueRule],
        ]);
    }

    protected function formatNamaJenisHewan($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }

    public function edit($id)
    {
        $jenis = DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->first();

        if (!$jenis) {
            abort(404);
        }

        return view('admin.JenisHewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateJenisHewan($request, $id);

        DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->update([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($request->nama_jenis_hewan),
            ]);

        return redirect()->route('admin.JenisHewan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('jenis_hewan')
            ->where('idjenis_hewan', $id)
            ->delete();

        return redirect()->route('admin.JenisHewan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
