<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class DashboardController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view('admin.dashboard', compact('leaves'));
    }
}