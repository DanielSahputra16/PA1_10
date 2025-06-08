<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan di database
    protected $table = 'galeri';

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'user_id',       // ID user pemilik galeri ini
        'title',         // Judul gambar/galeri
        'description',   // Deskripsi gambar/galeri
        'image_path',    // Path atau lokasi file gambar di storage
    ];

    // Relasi ke User: galeri dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
