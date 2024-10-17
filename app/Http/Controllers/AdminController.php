<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Pedagang;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function pedagang()
    {

        $pedagangs = Pedagang::paginate(10);
        return view('admin.pedagang', compact('pedagangs'));
    }
    public function dataadmin()
    {
        $users = User::whereIn('role', ['admin', 'operator'])->paginate(10);
        return view('admin.dataadmin', compact('users'));
    }
    public function tambahadmin()
    {
        return view('admin.form.tambahadmin');
    }
    public function keluhan()
    {
        $keluhans = Keluhan::with(['pembeli', 'pedagang'])->paginate(10);
        return view('admin.keluhan', compact('keluhans'));
    }
    public function pendapatan()
    {
        return view('admin.pendapatan');
    }
    public function profile()
    {
        // Ambil data pengguna dengan role 'admin'
        $user = User::where('role', 'admin')->first(); // Mengambil pengguna dengan role admin

        // Cek jika pengguna ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna dengan role admin tidak ditemukan.');
        }

        return view('admin.profile', compact('user'));
    }

    // public function profile()
    // {
    //     // Ambil email dari sesi
    //     $email = Session::get('email');

    //     // Ambil data pengguna berdasarkan email dan role admin
    //     $user = User::where('email', $email)->where('role', 'admin')->first();

    //     // Cek jika pengguna ditemukan
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Pengguna tidak ditemukan atau bukan admin.');
    //     }

    //     return view('admin.profile', compact('user'));
    // }

}
