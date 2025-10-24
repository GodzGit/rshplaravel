<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleUser;

class UserRoleController extends Controller
{
    public function index()
    {
        $userRole = RoleUser::with(['user','role'])->get();
        return view('admin.user.index', compact('userRole'));
    }
}
