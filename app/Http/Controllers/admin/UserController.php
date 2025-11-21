<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('user')
            ->leftJoin('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->leftJoin('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('user.*', 'role.nama_role')
            ->get();

        return view('admin.User.index', compact('user'));
    }

    public function create()
    {
        $role = DB::table('role')->get();
        return view('admin.User.create', compact('role'));
    }

    public function store(Request $request)
    {
        $data = $this->validateUser($request);

        // INSERT user
        $iduser = DB::table('user')->insertGetId([
            'nama'     => ucwords($data['nama']),
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // INSERT role_user
        DB::table('role_user')->insert([
            'iduser' => $iduser,
            'idrole' => $data['idrole'],
            'status' => 1
        ]);

        return redirect()->route('admin.User.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = DB::table('user')->where('iduser', $id)->first();
        $role = DB::table('role')->get();

        // ambil role aktif user
        $roleUser = DB::table('role_user')
            ->where('iduser', $id)
            ->first();

        return view('admin.User.edit', compact('user', 'role', 'roleUser'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateUserUpdate($request, $id);

        // update user
        DB::table('user')->where('iduser', $id)->update([
            'nama'  => ucwords($data['nama']),
            'email' => $data['email'],
        ]);

        // update password jika diisi
        if (!empty($data['password'])) {
            DB::table('user')->where('iduser', $id)->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        // update role_user
        DB::table('role_user')->where('iduser', $id)->update([
            'idrole' => $data['idrole']
        ]);

        return redirect()->route('admin.User.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('role_user')->where('iduser', $id)->delete();
        DB::table('user')->where('iduser', $id)->delete();

        return redirect()->route('admin.User.index')->with('success', 'User berhasil dihapus!');
    }

    protected function validateUser(Request $request)
    {
        return $request->validate([
            'nama'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'idrole'   => 'required|integer|exists:role,idrole',
        ]);
    }

    protected function validateUserUpdate(Request $request, $id)
    {
        return $request->validate([
            'nama'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|unique:user,email,' . $id . ',iduser',
            'password' => 'nullable|min:6',
            'idrole'   => 'required|integer|exists:role,idrole',
        ]);
    }
}
