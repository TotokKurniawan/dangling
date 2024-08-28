<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function pedagang()
    {
        return view('admin.pedagang');
    }
    public function mitra()
    {
        return view('admin.mitra');
    }
    public function keluhan()
    {
        return view('admin.keluhan');
    }
    public function pendapatan()
    {
        return view('admin.pendapatan');
    }
    public function profile()
    {
        return view('admin.profile');
    }
}
