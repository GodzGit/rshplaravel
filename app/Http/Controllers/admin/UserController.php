<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with(['activeRole.role'])->get();
        return view('admin.User.index', compact('user'));
    }


    public function create()
    {
        $role = Role::all();
        return view('admin.User.create', compact('role'));
    }

    public function store(Request $request)
    {
        $data = $this->validateUser($request);

        $this->createUser($data);

        return redirect()->route('admin.User.index')->with('success', 'User berhasil ditambahkan.');
    }

    protected function validateUser(Request $request)
    {
        return $request->validate([
            'nama'      => 'required|string|min:3|max:255',
            'email'     => 'required|email|unique:user,email',
            'password'  => 'required|min:6',
            'idrole'    => 'required|integer|exists:role,idrole',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'idrole.required' => 'Role wajib dipilih.',
        ]);
    }


    protected function createUser(array $data)
    {
        // Buat user baru
        $user = User::create([
            'nama'      => ucwords($data['nama']),
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);

        // Simpan role ke tabel role_user
        $user->roleUsers()->create([
            'idrole' => $data['idrole'],
            'status' => 1
        ]);

        return $user;
    }

}
