<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::all();
        return view('admin.pet.index', compact('pet'));
    }
}
