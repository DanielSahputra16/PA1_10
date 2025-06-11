<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLapangan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_lapangans';

    protected $fillable = [
        'user_id',      // ID user yang membuat jadwal
        'lapangan_id',  // ID lapangan
        'nama',         // Nama pemesan atau jadwal
        'waktu_mulai',  // Waktu mulai (datetime)
        'waktu_selesai',// Waktu selesai (datetime)
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',  // otomatis casting ke objek DateTime
        'waktu_selesai' => 'datetime',// otomatis casting ke objek DateTime
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}
