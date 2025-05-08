<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',  // Tambahkan 'jenis' ke daftar fillable
        'judul',
        'deskripsi',
        'gambar',
    ];
}
