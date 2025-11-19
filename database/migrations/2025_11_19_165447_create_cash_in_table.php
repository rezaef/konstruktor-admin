<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cash_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('nama', 255);
            $table->foreignId('metode_transaksi_id')->constrained('metode_transaksi')->onDelete('cascade');
            $table->decimal('jumlah', 10, 2);

            $table->timestamps();

            // Index untuk optimasi query berdasarkan proyek & tanggal
            $table->index(['project_id', 'tanggal']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cash_in');
    }
};
