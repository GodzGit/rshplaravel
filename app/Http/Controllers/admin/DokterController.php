<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::with('user')->get();
        return view('admin.dokter.index', compact('dokter'));
    }

    public function create()
    {
        $users = User::whereHas('activeRole', function ($q) {
            $q->where('idrole', 2); // role dokter
        })->get();

        return view('admin.dokter.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required|exists:user,iduser',
            'alamat' => 'required|string|max:100',
            'no_hp' => 'required|string|max:45',
            'bidang_dokter' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        Dokter::create([
            'iduser'        => $request->iduser,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'bidang_dokter' => $request->bidang_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $users = User::whereHas('activeRole', function ($q) {
            $q->where('idrole', 2);
        })->get();

        return view('admin.dokter.edit', compact('dokter', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'iduser'        => 'required|exists:user,iduser',
            'alamat'        => 'required|string|max:100',
            'no_hp'         => 'required|string|max:45',
            'bidang_dokter' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $dokter = Dokter::findOrFail($id);

        $dokter->update([
            'iduser'        => $request->iduser,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'bidang_dokter' => $request->bidang_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Dokter::findOrFail($id)->delete();

        return redirect()->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil dihapus!');
    }
}
