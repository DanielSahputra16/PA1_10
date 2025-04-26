<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts'; // Pastikan nama tabel ini benar!

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}
