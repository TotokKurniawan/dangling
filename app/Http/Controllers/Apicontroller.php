<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pedagang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Apicontroller extends Controller
{
    public function sign_in(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user ditemukan, cek apakah password cocok
        if ($user && Hash::check($request->password, $user->password)) {

            DB::table('oauth_access_tokens')
                ->where('user_id', $user->id)
                ->update(['revoked' => true]);

            $token = $user->createToken('token')->accessToken;

            return response()->json([
                'success' => true,
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
                'token' => $token,
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'Invalid credentials'], 401);
        }
    }
    public function sign_up(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 400);
        }

        // Buat user baru dengan role 'pembeli' secara default
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pembeli',
        ]);

        // Kembalikan response sukses dengan data user baru (tanpa password)
        return response()->json([
            'success' => true,
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ], 201);
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Successfully logged out']);
    }
    public function upgradeToSeller(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'namaToko' => 'required|string',
            'telfon' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data user berdasarkan id_user
        $user = User::find($request->id_user);

        // Simpan data pedagang
        $pedagang = new Pedagang();
        $pedagang->namaToko = $request->namaToko;
        $pedagang->telfon = $request->telfon;
        $pedagang->alamat = $request->alamat;

        // Proses foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('uploads', 'public');
            $pedagang->foto = $filePath;
        }

        // Set status default
        $pedagang->status = 'offline';
        $pedagang->id_user = $user->id; // Gunakan id_user dari request
        $pedagang->save();

        return response()->json(['success' => true]);
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'status' => 'required|in:online,offline',
        ]);

        $store = Pedagang::where('id_user', $request->id_user)->first();

        if (!$store) {
            return response()->json(['message' => 'Toko tidak ditemukan'], 404);
        }

        // Update status
        $store->status = $request->status;
        $store->save();

        return response()->json(['success' => true, 'message' => 'Status toko diperbarui'], 200);
    }
    public function tambahProduk(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan atau belum login'], 401);
        }

        if (!$user->pedagang) {
            return response()->json(['message' => 'User tidak memiliki akses sebagai pedagang'], 403);
        }

        // Validasi input produk
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|integer',
            'kategori_produk' => 'required|in:makanan ringan,makanan berat,jasa',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validatedData['id_pedagang'] = $user->pedagang->id;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $validatedData['foto'] = $path;
        } else {
            return response()->json(['message' => 'Foto wajib diisi'], 400);
        }

        try {
            $produk = Produk::create($validatedData);
            return response()->json([
                'message' => 'Produk berhasil ditambahkan',
                'produk' => $produk,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan produk: ' . $e->getMessage()], 500);
        }
    }









    // public function reset_password(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:6',
    //         'token' => 'required'
    //     ]);

    //     // Mencari token di database
    //     $reset = DB::table('password_resets')->where('token', $request->token)->first();

    //     if (!$reset) {
    //         return response()->json(['error' => 'Invalid token.'], 400);
    //     }

    //     // Memperbarui password
    //     $user = User::where('email', $reset->email)->first();
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     // Menghapus token dari database
    //     DB::table('password_resets')->where('token', $request->token)->delete();

    //     return response()->json(['status' => 'Password has been reset!'], 200);
    // }

}
