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
        Schema::create('cashflows', function (Blueprint $table) {
            $table->id();

            // Relasi ke project (opsional)
            $table->unsignedBigInteger('project_id')->nullable();

            // Data utama cashflow
            $table->date('tanggal')->nullable();
            $table->string('pengeluaran')->nullable();
            $table->string('volume')->nullable();

            // Metode pembayaran (checkbox)
            $table->boolean('metode_cash')->default(false);
            $table->boolean('metode_debit')->default(false);
            $table->boolean('metode_transfer')->default(false);
            $table->boolean('metode_kredit')->default(false);

            // Harga & total
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->decimal('harga_total', 15, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflows');
    }
};
