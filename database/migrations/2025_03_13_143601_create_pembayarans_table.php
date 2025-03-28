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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realisasi_id')->constrained('realisasis')->onDelete('cascade');
            $table->date('tgl_pembayaran');
            $table->decimal('jml_pembayaran');
            $table->enum('metode_pembayaran', ['cash', 'transfer']);
            $table->text('bukti_pembayaran');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
