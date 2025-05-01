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

    protected $casts = [
        'tanggal' => 'date',
        'lapangan_1_tersedia' => 'boolean',
        'lapangan_2_tersedia' => 'boolean',
    ];
}
