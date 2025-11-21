<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    public function index()
    {
        $pet = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'pet.*',
                'user.nama as nama_pemilik',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->get();

        return view('admin.Pet.index', compact('pet'));
    }

    public function create()
    {
        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama')
            ->get();

        $ras = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();

        return view('admin.Pet.create', compact('pemilik', 'ras'));
    }

    public function store(Request $request)
    {
        $data = $this->validatePet($request);

        DB::table('pet')->insert([
            'nama'          => ucwords(strtolower($data['nama'])),
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda'   => $data['warna_tanda'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik'     => $data['idpemilik'],
            'idras_hewan'   => $data['idras_hewan'],
        ]);

        return redirect()->route('admin.Pet.index')->with('success', 'Pet berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();

        if (!$pet) abort(404);

        $pemilik = DB::table('pemilik')
            ->join('user', 'pemilik.iduser', '=', 'user.iduser')
            ->select('pemilik.*', 'user.nama')
            ->get();

        $ras = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->get();

        return view('admin.Pet.edit', compact('pet', 'pemilik', 'ras'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validatePet($request);

        DB::table('pet')->where('idpet', $id)->update([
            'nama'          => ucwords(strtolower($data['nama'])),
            'tanggal_lahir' => $data['tanggal_lahir'],
            'warna_tanda'   => $data['warna_tanda'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'idpemilik'     => $data['idpemilik'],
            'idras_hewan'   => $data['idras_hewan'],
        ]);

        return redirect()->route('admin.Pet.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        DB::table('pet')->where('idpet', $id)->delete();

        return redirect()->route('admin.Pet.index')->with('success', 'Pet berhasil dihapus!');
    }

    protected function validatePet(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'warna_tanda' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'idpemilik' => 'required|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|exists:ras_hewan,idras_hewan',
        ]);
    }
}
