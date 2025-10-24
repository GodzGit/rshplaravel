<?php
namespace App\Http\Controllers;
use App\Models\{JenisHewan, Ras, Kategori, KategoriKlinis, KodeTindakan, Pet, Role, User};

class DataController extends Controller
{
    public function jenis() {
        $data = JenisHewan::all();
        return view('admin.data.jenis', compact('data'));
    }

    public function ras() {
        $data = Ras::with('jenis')->get();
        return view('admin.data.ras', compact('data'));
    }

    public function kategori() {
        $data = Kategori::all();
        return view('admin.data.kategori', compact('data'));
    }

    public function kategoriKlinis() {
        $data = KategoriKlinis::all();
        return view('admin.data.kategori_klinis', compact('data'));
    }

    public function kodeTindakan() {
        $data = KodeTindakan::with(['kategori','kategoriKlinis'])->get();
        return view('admin.data.kode_tindakan', compact('data'));
    }

    public function pet() {
        $data = Pet::with(['pemilik','ras'])->get();
        return view('admin.data.pet', compact('data'));
    }

    public function role() {
        $data = Role::all();
        return view('admin.data.role', compact('data'));
    }

    public function user() {
        $data = User::with('roles')->get();
        return view('admin.data.user', compact('data'));
    }
}
