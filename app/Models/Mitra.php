<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'mitras'; // Nama tabel dalam database

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'email',
        'perusahaan'
    ];
}
