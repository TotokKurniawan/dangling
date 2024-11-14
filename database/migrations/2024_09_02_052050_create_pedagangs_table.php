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
    Schema::create('pedagangs', function (Blueprint $table) {
        $table->id();
        $table->string('namaToko')->nullable();
        $table->char('telfon')->nullable();
        $table->string('alamat')->nullable();
        // $table->binary('foto');
        $table->string('foto');
        $table->enum('status', ['online', 'offline']);
        $table->decimal('latitude')->nullable();
        $table->decimal('longtitude')->nullable();
        $table->unsignedBigInteger('id_user');
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedagangs');
    }
};
