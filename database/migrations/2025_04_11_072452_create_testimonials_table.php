<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel users
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps(); // created_at, updated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Jika user dihapus, testimonial juga dihapus
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
