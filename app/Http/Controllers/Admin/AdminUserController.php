<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $leaves = User::where('is_admin', 0)->get();
        return view('admin.user', compact('leaves'));
    }
}