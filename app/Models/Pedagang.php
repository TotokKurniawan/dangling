<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    use HasFactory;
    protected $table = 'pedagangs'; // Nama tabel dalam database

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'telfon',
        'alamat',
        'foto',
        'status',
        'id user'
    ];
}
