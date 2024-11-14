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
            $table->enum('status',['Menunggu','Diterima','Ditolak']);
            $table->string('bentuk_pembayaran'); // Menggunakan string() untuk varchar
            $table->point('koordinat_pembeli');
            $table->point('koordinat_pedagang');
            $table->unsignedBigInteger('id_pembeli'); // Ganti spasi dengan underscore
            $table->unsignedBigInteger('id_pedagang'); // Ganti spasi dengan underscore
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
        Schema::table('histories', function (Blueprint $table) {
            // Menghapus foreign key constraints sebelum menghapus tabel
            $table->dropForeign(['id_pembeli']);
            $table->dropForeign(['id_pedagang']);
        });

        Schema::dropIfExists('histories'); // Tidak perlu `table:` di sini
    }
};
