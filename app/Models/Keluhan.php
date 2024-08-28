<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = 'keluhans'; // Nama tabel dalam database

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'deksripsi',
        'rating',
    ];
}
