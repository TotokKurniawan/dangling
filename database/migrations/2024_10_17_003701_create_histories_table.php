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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak']);
            $table->string('bentuk_pembayaran'); // Menggunakan 'string' untuk teks
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_pedagang');
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('id_pembeli')->references('id')->on('pembelis')->onDelete('cascade');
            $table->foreign('id_pedagang')->references('id')->on('pedagangs')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'histories', callback: function (Blueprint $table) {
            // Menghapus foreign key constraints sebelum menghapus tabel
            $table->dropForeign(['id_pembeli']);
            $table->dropForeign(['id_pedagang']);
        });
        Schema::dropIfExists(table: 'histories');
    }
};
