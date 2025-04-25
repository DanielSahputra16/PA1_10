<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservasiModel extends Model
{
    use HasFactory;

    protected $table = 'reservasis'; // pastikan nama tabel sesuai

    protected $fillable = [
        'user_id', // kalau ada
        'lapangan_id',
        'tanggal_reservasi',
        'jam_mulai',
        'jam_selesai',
        // tambahkan sesuai kebutuhanmu
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }
}
