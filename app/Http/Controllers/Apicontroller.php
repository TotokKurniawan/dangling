<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;



class Apicontroller extends Controller
{
    public function sign_in(Request $request)
    {
        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user ditemukan, cek apakah password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Kembalikan data user atau token (jika perlu)
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            // Jika email atau password salah
            return response()->json(['success' => false, 'error' => 'Invalid credentials'], 401);
        }
    }

    public function sign_up(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|string', // Foto bersifat opsional
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        // Simpan user baru dengan role 'pembeli' secara default
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password sebelum disimpan
            'foto' => $request->foto, // Opsional, bisa disimpan jika ada
            'role' => 'pembeli', // Default role saat registrasi adalah pembeli
        ]);

        // Kembalikan response sukses dengan data user yang baru dibuat
        return response()->json(['success' => true, 'user' => $user], 201);
    }

    // Fungsi untuk upgrade user menjadi penjual
    public function upgradeToSeller(Request $request)
{
    // Validasi input untuk memastikan latitude dan longitude disediakan
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    // Cek apakah validasi gagal
    if ($validator->fails()) {
        return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
    }

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Jika user ditemukan, ubah role menjadi penjual dan simpan lokasi
    if ($user) {
        $user->update([
            'role' => 'penjual', // Ubah role menjadi penjual
            'latitude' => $request->latitude, // Simpan latitude
            'longitude' => $request->longitude, // Simpan longitude
        ]);

        return response()->json(['success' => true, 'message' => 'Role updated to seller', 'user' => $user]);
    } else {
        return response()->json(['success' => false, 'error' => 'User not found'], 404);
    }
}

public function forgot_password(Request $request)
    {
        // Validasi email
        $request->validate(['email' => 'required|email']);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json(['error' => 'Email not found.'], 404);
        }

        // Menghasilkan token reset password
        $token = Str::random(60);
        
        // Menyimpan token ke database (atau tabel password_resets)
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Mengirimkan email reset password
        Mail::send('emails.reset_password', ['token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password');
        });

        return response()->json(['status' => 'Reset link sent to your email.'], 200);
    }

    // Mengatur password baru
    public function reset_password(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        // Mencari token di database
        $reset = DB::table('password_resets')->where('token', $request->token)->first();
        
        if (!$reset) {
            return response()->json(['error' => 'Invalid token.'], 400);
        }

        // Memperbarui password
        $user = User::where('email', $reset->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        // Menghapus token dari database
        DB::table('password_resets')->where('token', $request->token)->delete();

        return response()->json(['status' => 'Password has been reset!'], 200);
    }

}
