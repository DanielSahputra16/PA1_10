<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0); // nilai default 0
            $table->string('nama');
            $table->string('no_hp', 20);
            $table->foreignId('lapangan_id')->constrained();
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
            $table->softDeletes(); // Tambahkan baris ini!

            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan foreign key constraint ke tabel users
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};

