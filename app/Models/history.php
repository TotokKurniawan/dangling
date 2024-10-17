<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'historys';
    protected $fillable = [
        'history',
        'bentuk_pembayaran',
        'koordinat pembeli', // nama kolom diubah untuk mengikuti konvensi penamaan
        'koordinat pedagang', // sama seperti di atas
    ];

    // Relasi ke tabel pembelis
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id pembeli');
    }

    // Relasi ke tabel pedagangs
    public function pedagang()
    {
        return $this->belongsTo(Pedagang::class, 'id pedagang');
    }
}
