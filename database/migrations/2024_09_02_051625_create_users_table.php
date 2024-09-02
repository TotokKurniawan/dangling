<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->string('nama'); // Kolom untuk nama pengguna
            $table->string('email')->unique(); // Kolom untuk email pengguna dengan unique constraint
            $table->string('password'); // Kolom untuk password pengguna
            $table->enum('role', ['admin', 'operator', 'pembeli', 'pedagang']); // Kolom enum untuk role
            $table->rememberToken(); // Kolom untuk token ingat pengguna (jika menggunakan fitur "remember me")
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
