<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil user + role aktif
        $user = User::with('activeRole.role')
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        Auth::login($user);

        // Simpan info penting
        $request->session()->put([
            'user_id'    => $user->iduser,
            'user_name'  => $user->nama,
            'user_email' => $user->email,
        ]);

        // Ambil role berdasarkan relasi
        $role = $user->activeRole->role->nama_role ?? null;

        if (!$role) {
            return redirect()->back()->with('error', 'Role tidak ditemukan atau tidak aktif.');
        }

        // Arahkan sesuai role
        switch (strtolower($role)) {
            case 'administrator':
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Login berhasil sebagai Administrator!');

            case 'dokter':
                return redirect()->route('dokter.dashboard')
                    ->with('success', 'Login berhasil sebagai Dokter!');

            case 'perawat':
                return redirect()->route('perawat.dashboard')
                    ->with('success', 'Login berhasil sebagai Perawat!');

            case 'resepsionis':
                return redirect()->route('resepsionis.dashboard')
                    ->with('success', 'Login berhasil sebagai Resepsionis!');

            case 'pemilik':
                return redirect()->route('pemilik.dashboard')
                    ->with('success', 'Login berhasil sebagai Pemilik!');

            default:
                return redirect('/')
                    ->with('success', 'Login berhasil!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
