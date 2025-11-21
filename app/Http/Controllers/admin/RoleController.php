<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $role = DB::table('role')->get();
        return view('admin.Role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.Role.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateRole($request);

        DB::table('role')->insert([
            'nama_role' => ucwords(strtolower($data['nama_role'])),
        ]);

        return redirect()->route('admin.Role.index')->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $role = DB::table('role')->where('idrole', $id)->first();

        return view('admin.Role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateRole($request, $id);

        DB::table('role')->where('idrole', $id)->update([
            'nama_role' => ucwords(strtolower($data['nama_role'])),
        ]);

        return redirect()->route('admin.Role.index')->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('role')->where('idrole', $id)->delete();

        return redirect()->route('admin.Role.index')->with('success', 'Role berhasil dihapus.');
    }

    /* ==================== VALIDATOR ==================== */

    protected function validateRole(Request $request, $id = null)
    {
        $uniqueRule = $id
            ? 'unique:role,nama_role,' . $id . ',idrole'
            : 'unique:role,nama_role';

        return $request->validate([
            'nama_role' => ['required', 'string', 'min:3', 'max:100', $uniqueRule],
        ], [
            'nama_role.required' => 'Nama role wajib diisi.',
            'nama_role.string'   => 'Nama role harus berupa teks.',
            'nama_role.min'      => 'Nama role minimal 3 karakter.',
            'nama_role.max'      => 'Nama role maksimal 100 karakter.',
            'nama_role.unique'   => 'Nama role sudah digunakan.',
        ]);
    }
}
