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
        Schema::create('realisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsinyasi_id')->constrained('konsinyasis')->onDelete('cascade');
            $table->date('tgl_realisasi');
            $table->integer('total_terjual');
            $table->integer('total_retur');
            $table->decimal('total_harus_bayar');
            $table->decimal('total_sudah_dibayar');
            $table->enum('status', ['belum_lunas', 'lunas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisasis');
    }
};
