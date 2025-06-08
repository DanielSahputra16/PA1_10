<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Model User bawaan Laravel untuk autentikasi
use Illuminate\Notifications\Notifiable; // Untuk notifikasi
use Laravel\Sanctum\HasApiTokens; // Untuk API token dengan Sanctum

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // Menggunakan trait untuk API token, factory, dan notifikasi

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',      // Nama user
        'email',     // Email user
        'password',  // Password user
        'is_admin'   // Status apakah user admin atau bukan
    ];

    /**
     * Atribut yang harus disembunyikan saat serialization (misal response JSON).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',       // Sembunyikan password
        'remember_token', // Token untuk fitur "remember me"
    ];

    /**
     * Casting atribut ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Konversi tanggal verifikasi email ke datetime
    ];

    /**
     * Cek apakah user adalah admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === 1; // Mengembalikan true jika user admin (1), false jika bukan
    }

    /**
     * Relasi one-to-many dengan model Testimonial.
     *
     * Satu user dapat memiliki banyak testimonial.
     */
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
