<?php

namespace App\Http\Controllers;

use App\Http\Requests\MitraRequest;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function mitra()
    {
        $mitras = Mitra::paginate(10); // Aktifkan pagination
        return view('admin.mitra', compact('mitras'));
    }

    public function tambahmitra()
    {
        return view('admin.form.tambah');
    }
    public function store(MitraRequest $request)
    {
        // Data sudah tervalidasi di PengeluaranRequest
        Mitra::create($request->validated());

        // Redirect setelah berhasil menyimpan data
        return redirect()->route('Mitra')->with('success', 'Mitra berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id); // Temukan mitra berdasarkan ID
        $mitra->delete(); // Hapus data

        return redirect()->back()->with('success', 'Data mitra berhasil dihapus!');
    }
}
