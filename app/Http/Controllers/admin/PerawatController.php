<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perawat;
use App\Models\User;

class PerawatController extends Controller
{
    public function index()
    {
        $perawat = Perawat::with('user')->get();
        return view('admin.perawat.index', compact('perawat'));
    }

    public function create()
    {
        // ambil user yang rolenya perawat
        $users= User::whereHas('activeRole.role', function($q){
            $q->where('nama_role', 'Perawat');
        })->get();

        return view('admin.perawat.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'jenis_kelamin' => 'required',
            'pendidikan' => 'nullable',
        ]);

        Perawat::create($request->all());

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perawat = Perawat::findOrFail($id);
        return view('admin.perawat.edit', compact('perawat'));
    }

    public function update(Request $request, $id)
    {
        $perawat = Perawat::findOrFail($id);
        $perawat->update($request->all());

        return redirect()->route('admin.perawat.index')
            ->with('success', 'Data perawat berhasil diupdate.');
    }

    public function destroy($id)
    {
        Perawat::destroy($id);

        return back()->with('success', 'Data perawat berhasil dihapus.');
    }
}
