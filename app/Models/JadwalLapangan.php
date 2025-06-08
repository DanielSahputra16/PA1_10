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
        'nama',         // Nama pemesan atau jadwal
        'waktu_mulai',  // Waktu mulai (datetime)
        'waktu_selesai',// Waktu selesai (datetime)
        'lapangan_1',   // Status lapangan 1 (boolean)
        'lapangan_2',   // Status lapangan 2 (boolean)
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',  // otomatis casting ke objek DateTime
        'waktu_selesai' => 'datetime',// otomatis casting ke objek DateTime
        'lapangan_1' => 'boolean',    // casting ke boolean
        'lapangan_2' => 'boolean',    // casting ke boolean
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
