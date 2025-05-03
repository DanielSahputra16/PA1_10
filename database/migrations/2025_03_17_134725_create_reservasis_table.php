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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(0); // nilai default 0
            $table->string('nama');
            $table->string('no_hp', 20);
            $table->foreignId('lapangan_id')->constrained();
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai');
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan foreign key constraint ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
