<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLapangan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_lapangans';

    protected $fillable = [
        'user_id', // Tambahkan user_id ke daftar fillable
        'nama',
        'waktu_mulai',
        'waktu_selesai',
        'lapangan_1',
        'lapangan_2',
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime:H:i',
        'waktu_selesai' => 'datetime:H:i',
        'lapangan_1' => 'boolean',
        'lapangan_2' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
