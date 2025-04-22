<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Tambahkan ini jika Anda ingin soft delete

class Reservasi extends Model
{
    use HasFactory, SoftDeletes; // tambahkan softdeletes jika ingin soft delete

    protected $fillable = [ // Tambahkan semua atribut yang bisa diisi (fillable)
        'lapangan_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        //Tambahkan properti lainnya jika ada
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsBookedBetween($query, $start, $end)
    {
        return $query->where('tanggal_mulai', '<', $end)
                    ->where('tanggal_selesai', '>', $start);
    }
}
