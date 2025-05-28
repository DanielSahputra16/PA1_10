<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan user_id ke daftar fillable
        'judul',
        'deskripsi',
        'gambar',
        'jenis', // jenis
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
