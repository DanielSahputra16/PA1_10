<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lapangan_1_tersedia',
        'lapangan_2_tersedia',
    ];
}
