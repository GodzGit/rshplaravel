<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasController extends Controller
{
    public function index()
    {
        $ras = DB::table('ras_hewan as r')
            ->join('jenis_hewan as j', 'r.idjenis_hewan', '=', 'j.idjenis_hewan')
            ->select('r.idras_hewan', 'r.nama_ras', 'j.nama_jenis_hewan')
            ->get();

        return view('admin.RasHewan.index', compact('ras'));
    }

    public function create()
    {
        // untuk dropdown memilih jenis hewan
        $jenis = DB::table('jenis_hewan')->select('idjenis_hewan', 'nama_jenis_hewan')->get();

        return view('admin.RasHewan.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $this->validateRas($request);

        DB::table('ras_hewan')->insert([
            'nama_ras' => $this->formatNamaRas($request->nama_ras),
            'idjenis_hewan'  => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.RasHewan.index')
            ->with('success', 'Ras Hewan berhasil ditambahkan.');
    }

    protected function validateRas(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:ras_hewan,nama_ras,' . $id . ',idras_hewan'
            : 'unique:ras_hewan,nama_ras';

        return $request->validate([
            'nama_ras' => ['required', 'string', 'min:2', 'max:255', $uniqueRule],
            'idjenis_hewan'  => ['required', 'integer', 'exists:jenis_hewan,idjenis_hewan'],
        ], [
            'nama_ras.required' => 'Nama ras wajib diisi.',
            'idjenis_hewan.required'  => 'Jenis hewan wajib dipilih.',
        ]);
    }

    protected function formatNamaRas($nama)
    {
        return ucwords(strtolower(trim($nama)));
    }

    public function edit($id)
    {
        $ras = DB::table('ras_hewan')
            ->where('idras_hewan', $id)
            ->first();

        if (!$ras) abort(404);

        $jenis = DB::table('jenis_hewan')->get();

        return view('admin.RasHewan.edit', compact('ras', 'jenis'));
    }

    public function update(Request $request, $id)
    {
        $this->validateRas($request, $id);

        DB::table('ras_hewan')
            ->where('idras_hewan', $id)
            ->update([
                'nama_ras' => $this->formatNamaRas($request->nama_ras),
                'idjenis_hewan'  => $request->idjenis_hewan,
            ]);

        return redirect()->route('admin.RasHewan.index')
            ->with('success', 'Data ras hewan berhasil diupdate.');
    }

    public function destroy($id)
    {
        DB::table('ras_hewan')
            ->where('idras_hewan', $id)
            ->delete();

        return redirect()->route('admin.RasHewan.index')
            ->with('success', 'Data ras hewan berhasil dihapus.');
    }
}
