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
    Schema::create('acaras', function (Blueprint $table) {
        $table->id();
        $table->string('nama_acara');
        $table->text('deskripsi')->nullable();
        $table->string('lokasi');
        $table->dateTime('tanggal_mulai');
        $table->dateTime('tanggal_selesai')->nullable();
        $table->decimal('harga_tiket', 12, 2)->default(0);
        $table->unsignedInteger('kuota');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
