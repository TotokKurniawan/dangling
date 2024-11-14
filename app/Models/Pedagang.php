<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    use HasFactory;
    protected $table = 'pedagangs';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'namaToko',
        'telfon',
        'alamat',
        'foto',
        'status',
        'latitude',
        'longtitude',
        'id_user' 
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Foreign key 'id_user'
    }
}
