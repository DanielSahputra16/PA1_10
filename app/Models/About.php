<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Nama tabel di database yang terkait dengan model ini
    protected $table = 'abouts';

    // Field mana saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'user_id',    // ID user yang membuat/mengelola About
        'judul',      // Judul tentang About
        'deskripsi',  // Deskripsi About
        'gambar',     // Nama atau path file gambar
    ];

    // Relasi many-to-one ke model User
    public function user()
    {
        // Setiap About dimiliki oleh satu User
        return $this->belongsTo(User::class);
    }
}
