<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.Role.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateRole($request);
        $this->createRole($data);

        return redirect()
            ->route('admin.Role.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    // === Helpers ===
    protected function validateRole(Request $request, $id = null): array
    {
        $unique = $id
            ? 'unique:role,nama_role,' . $id . ',idrole'
            : 'unique:role,nama_role';

        return $request->validate(
            [
                'nama_role' => ['required', 'string', 'min:3', 'max:100', $unique],
            ],
            [
                'nama_role.required' => 'Nama role wajib diisi.',
                'nama_role.string'   => 'Nama role harus berupa teks.',
                'nama_role.min'      => 'Nama role minimal 3 karakter.',
                'nama_role.max'      => 'Nama role maksimal 100 karakter.',
                'nama_role.unique'   => 'Nama role sudah terdaftar.',
            ]
        );
    }

    protected function createRole(array $data): Role
    {
        return Role::create([
            'nama_role' => $this->formatRoleName($data['nama_role']),
        ]);
    }

    protected function formatRoleName(string $name): string
    {
        return trim(ucwords(strtolower($name)));
    }
}
