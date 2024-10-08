<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users'; // Nama tabel dalam database

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
}
