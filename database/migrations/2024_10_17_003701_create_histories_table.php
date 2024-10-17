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
            $table->varchar('history');
            $table->varchar('bentuk_pembayaran');
            $table->point('koordinat_pembeli');
            $table->point('koordinat_pedagang');
            $table->unsignedBigInteger('id pembeli'); // Ganti spasi dengan underscore
            $table->unsignedBigInteger('id pedagang'); // Ganti spasi dengan underscore
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('id pembeli')->references('id')->on('pembelis')->onDelete('cascade');
            $table->foreign('id pedagang')->references('id')->on('pedagangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'histories', callback: function (Blueprint $table) {
            // Menghapus foreign key constraints sebelum menghapus tabel
            $table->dropForeign(['id pembeli']);
            $table->dropForeign(['id pedagang']);
        });
        Schema::dropIfExists(table: 'histories');
    }
};
