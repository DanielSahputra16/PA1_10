<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator; // Import Validator (tidak digunakan di sini, tapi bisa dipakai untuk validasi manual)

class Reservasi extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan trait HasFactory untuk factory dan SoftDeletes untuk hapus data secara soft delete (tidak langsung dihapus dari database)

    // Definisikan konstanta status untuk menjaga konsistensi status reservasi
    const STATUS_PENDING = 'pending';           // Status reservasi baru, belum dikonfirmasi
    const STATUS_DIKONFIRMASI = 'dikonfirmasi'; // Status reservasi sudah dikonfirmasi
    const STATUS_DIBATALKAN = 'dibatalkan';     // Status reservasi dibatalkan
    const STATUS_SELESAI = 'selesai';           // Status reservasi selesai (opsional)

    // Kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',          // Nama pemesan
        'no_hp',         // Nomor HP pemesan
        'lapangan_id',   // ID lapangan yang dipesan (relasi)
        'user_id',       // ID user pemesan (relasi)
        'tanggal_mulai', // Waktu mulai reservasi
        'tanggal_selesai', // Waktu selesai reservasi
        'status',        // Status reservasi (pending, dikonfirmasi, dll)
    ];

    // Casting atribut tertentu agar otomatis diubah ke tipe data tertentu saat diakses
    protected $casts = [
        'tanggal_mulai' => 'datetime',   // Otomatis jadi objek Carbon untuk manipulasi tanggal
        'tanggal_selesai' => 'datetime', // Otomatis jadi objek Carbon
    ];

    // Relasi reservasi ke lapangan (Many to One)
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    // Relasi reservasi ke user (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk mengambil reservasi yang waktunya beririsan dengan interval $start dan $end
     * Berguna untuk mengecek bentrok jadwal
     */
    public function scopeIsBookedBetween($query, $start, $end)
    {
        return $query->where('tanggal_mulai', '<', $end)  // Mulai sebelum waktu akhir interval
                     ->where('tanggal_selesai', '>', $start); // Selesai setelah waktu mulai interval
    }

    // Helper method untuk cek apakah status reservasi sedang pending
    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    // Helper method untuk cek apakah status reservasi sudah dikonfirmasi
    public function isDikonfirmasi(): bool
    {
        return $this->status === self::STATUS_DIKONFIRMASI;
    }

    // Method untuk membatalkan reservasi (ubah status dan simpan)
    public function batalkan(): void
    {
        $this->status = self::STATUS_DIBATALKAN;
        $this->save();
    }

    // Method untuk mengonfirmasi reservasi (ubah status dan simpan)
    public function konfirmasi(): void
    {
        $this->status = self::STATUS_DIKONFIRMASI;
        $this->save();
    }
}
