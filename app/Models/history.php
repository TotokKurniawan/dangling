<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'historys';
    protected $fillable = [
        'status',
        'bentuk_pembayaran',
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
