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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_peminjaman');
            $table->date('tgl_kembali')->nullable();
            $table->enum('status_peminjaman',['Dipinjam','Dikembalikan'])->default('Dipinjam');
            $table->foreignId('anggota_id')->constrained('anggotas')->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->timestamps();
        });

        Schema::create('peminjaman_bukus', function (Blueprint $table){
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('peminjamans')->onDelete('cascade');
            $table->foreignId('buku_id')->constrained('bukus')->onDelete('restrict');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
        Schema::dropIfExists('peminjaman_bukus');
    }
};
