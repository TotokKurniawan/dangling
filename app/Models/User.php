<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Pastikan menggunakan ini
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Pastikan ini adalah kelas yang diwarisi
{
    use HasFactory, Notifiable; // Tambahkan Notifiable untuk fitur notifikasi

    protected $table = 'users'; // Nama tabel dalam database

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
        'foto',
    ];

    // Kolom yang harus di-hash
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
