<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'no_hp',
        'lapangan_id',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'status', // Ditambahkan status
    ];

    protected $casts = [
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
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
