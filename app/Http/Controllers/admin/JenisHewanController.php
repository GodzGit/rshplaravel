<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisHewan;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function index()
    {
        // eloquent
        // $jenisHewan = JenisHewan::all();
        // return view('admin.JenisHewan.index', compact('jenisHewan'));
        $jenisHewan = DB::table('jenis_hewan')  ->select('idjenis_hewan', 'nama_jenis_hewan')->get();
        return view('admin.JenisHewan.index', compact('jenisHewan'));
    }
    public function create()
    {
        return view('admin.JenisHewan.create');
    }
    public function store(Request $request)
    {
        $validatedData =$this->validateJenisHewan($request);

        $jenisHewan = $this->createJenisHewan($validatedData);

        return redirect()->route('admin.JenisHewan.index')->with('success', 'Jenis Hewan berhasil ditambahkan.');
    }

    protected function validateJenisHewan(Request $request, $id = null)
    {
        $uniqueRule = $id ?
            'unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan' :
            'unique:jenis_hewan,nama_jenis_hewan';

        return $request->validate([
            'nama_jenis_hewan' => ['required', 'string', 'max:255', 'min:3', $uniqueRule],
        ], [
            'nama_jenis_hewan.required' => 'Nama Jenis Hewan wajib diisi.',
            'nama_jenis_hewan.unique' => 'Nama Jenis Hewan sudah ada.',
            'nama_jenis_hewan.min' => 'Nama Jenis Hewan minimal 3 karakter.',
            'nama_jenis_hewan.max' => 'Nama Jenis Hewan maksimal 255 karakter.',
            'nama_jenis_hewan.string' => 'Nama Jenis Hewan harus berupa string.',
        ]); 
    }

    protected function createJenisHewan(array $data)
    {
        try {
            // return JenisHewan::create([
            //     'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            // ]);
            return DB::table('jenis_hewan')->insert([
                'nama_jenis_hewan' => $this->formatNamaJenisHewan($data['nama_jenis_hewan']),
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            throw new \Exception('Gagal membuat Jenis Hewan: ' . $e->getMessage());
        }
    }

    protected function formatNamaJenisHewan($nama)
    {
        return trim(ucwords(strtolower($nama)));
    }
}
