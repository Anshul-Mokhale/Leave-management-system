<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function index()
    {
        return view('admin.dashboard'); // Return view for admin dashboard
    }
}
