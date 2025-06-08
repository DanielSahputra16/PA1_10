<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory; // Menggunakan trait HasFactory untuk memudahkan pembuatan factory data dummy/testing

    /**
     * Atribut yang bisa diisi secara massal (mass assignment).
     * Artinya, saat membuat/mengupdate model, atribut ini boleh diisi sekaligus.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',  // ID user yang membuat testimonial (relasi ke tabel users)
        'name',     // Nama pengirim testimonial
        'email',    // Email pengirim testimonial
        'subject',  // Judul/subject testimonial
        'message',  // Isi pesan testimonial
    ];

    /**
     * Relasi testimonial ke user (Many to One).
     * Satu testimonial dibuat oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
