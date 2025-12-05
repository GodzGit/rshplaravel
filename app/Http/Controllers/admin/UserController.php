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

        // 1. Insert ke tabel user
        $iduser = DB::table('user')->insertGetId([
            'nama'     => ucwords($data['nama']),
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // 2. Insert ke tabel role_user
        DB::table('role_user')->insert([
            'iduser' => $iduser,
            'idrole' => $data['idrole'],
            'status' => 1
        ]);

        // 3. Buat data spesifik sesuai role
        $this->createRoleData($iduser, $data['idrole']);

        return redirect()->route('admin.User.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = DB::table('user')->where('iduser', $id)->first();
        $role = DB::table('role')->get();

        $roleUser = DB::table('role_user')
            ->where('iduser', $id)
            ->first();

        return view('admin.User.edit', compact('user', 'role', 'roleUser'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->validateUserUpdate($request, $id);

        // 1. Update data user
        DB::table('user')->where('iduser', $id)->update([
            'nama'  => ucwords($data['nama']),
            'email' => $data['email'],
        ]);

        // 2. Update password jika ada
        if (!empty($data['password'])) {
            DB::table('user')->where('iduser', $id)->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        // 3. Cek role lama
        $oldRole = DB::table('role_user')->where('iduser', $id)->first();

        // 4. Kalau role berubah → hapus data lama → buat data baru
        if ($oldRole->idrole != $data['idrole']) {
            $this->deleteRoleData($id, $oldRole->idrole);     // hapus data lama
            $this->createRoleData($id, $data['idrole']);      // buat data baru
        }

        // 5. Update tabel role_user
        DB::table('role_user')->where('iduser', $id)->update([
            'idrole' => $data['idrole']
        ]);

        return redirect()->route('admin.User.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // hapus role_user
        $roleUser = DB::table('role_user')->where('iduser', $id)->first();
        if ($roleUser) {
            $this->deleteRoleData($id, $roleUser->idrole);
        }

        DB::table('role_user')->where('iduser', $id)->delete();
        DB::table('user')->where('iduser', $id)->delete();

        return redirect()->route('admin.User.index')->with('success', 'User berhasil dihapus!');
    }


    /* ============================
        Helper: Membuat data role
       ============================ */
    private function createRoleData($iduser, $idrole)
    {
        $role = DB::table('role')->where('idrole', $idrole)->first();
        $roleName = strtolower($role->nama_role);

        switch ($roleName) {
            case 'pemilik':
                DB::table('pemilik')->insert([
                    'iduser' => $iduser,
                    'alamat' => '-',
                    'no_wa'  => '-',
                ]);
                break;

            case 'dokter':
                DB::table('dokter')->insert([
                    'iduser' => $iduser,
                    'alamat' => '-',
                    'no_hp' => '-',
                    'bidang_dokter' => '-',
                    'jenis_kelamin' => 'L',
                ]);
                break;

            case 'perawat':
                DB::table('perawat')->insert([
                    'iduser' => $iduser,
                    'alamat' => '-',
                    'no_hp' => '-',
                    'jenis_kelamin' => 'L',
                    'pendidikan' => '-',
                ]);
                break;
        }
    }

    /* ============================
        Helper: Menghapus data role
       ============================ */
    private function deleteRoleData($iduser, $idrole)
    {
        $role = DB::table('role')->where('idrole', $idrole)->first();
        $roleName = strtolower($role->nama_role);

        switch ($roleName) {
            case 'pemilik':
                DB::table('pemilik')->where('iduser', $iduser)->delete();
                break;
            case 'dokter':
                DB::table('dokter')->where('iduser', $iduser)->delete();
                break;
            case 'perawat':
                DB::table('perawat')->where('iduser', $iduser)->delete();
                break;
        }
    }


    /* ============================
        Validation
       ============================ */
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
