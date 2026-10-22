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
    Schema::create('pemesanans', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('acara_id')
            ->constrained('acaras')
            ->cascadeOnDelete();

        $table->string('kode_pemesanan')->unique();
        $table->unsignedInteger('jumlah_tiket');
        $table->decimal('total_harga', 12, 2);
        $table->string('status')->default('menunggu');

        $table->timestamps();

        $table->index(['user_id', 'acara_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
