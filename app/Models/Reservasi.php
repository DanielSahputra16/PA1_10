<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator; // Import Validator

class Reservasi extends Model
{
    use HasFactory, SoftDeletes;

    // Definisikan konstanta status
    const STATUS_PENDING = 'pending';
    const STATUS_DIKONFIRMASI = 'dikonfirmasi';
    const STATUS_DIBATALKAN = 'dibatalkan';
    const STATUS_SELESAI = 'selesai'; // Opsional

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

    // Method helper untuk status
    public function isPending() : bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isDikonfirmasi() : bool
    {
        return $this->status === self::STATUS_DIKONFIRMASI;
    }

    public function batalkan() : void
    {
        $this->status = self::STATUS_DIBATALKAN;
        $this->save();
    }

    public function konfirmasi() : void
    {
        $this->status = self::STATUS_DIKONFIRMASI;
        $this->save();
    }
}
