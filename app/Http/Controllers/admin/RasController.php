<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ras;

class RasController extends Controller
{
    public function index()
    {
        $ras = Ras::with('JenisHewan')->get();
        return view('admin.RasHewan.index', compact('ras'));
    }
}
