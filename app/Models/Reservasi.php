<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator; // Import Validator (tidak digunakan di sini, tapi bisa dipakai untuk validasi manual)
use Carbon\Carbon;

class Reservasi extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan trait HasFactory untuk factory dan SoftDeletes untuk hapus data secara soft delete (tidak langsung dihapus dari database)

    // Definisikan konstanta status untuk menjaga konsistensi status reservasi
    const STATUS_PENDING = 'pending';           // Status reservasi baru, belum dikonfirmasi
    const STATUS_DIKONFIRMASI = 'dikonfirmasi'; // Status reservasi sudah dikonfirmasi
    const STATUS_DIBATALKAN = 'dibatalkan';     // Status reservasi dibatalkan

    // Kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',          // Nama pemesan
        'no_hp',         // Nomor HP pemesan
        'lapangan_id',   // ID lapangan yang dipesan (relasi)
        'user_id',       // ID user pemesan (relasi)
        'waktu_mulai',  // Waktu mulai (datetime)
        'waktu_selesai',// Waktu selesai (datetime)
        'status',        // Status reservasi (pending, dikonfirmasi, dll)
        'gambar',
    ];

    // Casting atribut tertentu agar otomatis diubah ke tipe data tertentu saat diakses
    protected $casts = [
        'waktu_mulai' => 'datetime',  // Waktu mulai (datetime)
        'waktu_selesai' => 'datetime',// Waktu selesai (datetime)  // Otomatis jadi objek Carbon untuk manipulasi tanggal
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
        // Kita HANYA bisa mengecek apakah tanggal mulai berada di antara $start dan $end
        // Modifikasi: Kita SEKARANG mengecek apakah ada irisan, bukan hanya tanggal mulai
        return $query->where(function ($query) use ($start, $end) {
            $query->where('waktu_mulai', '<', $end)
                  ->where('waktu_selesai', '>', $start);
        });
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

    // Setter untuk waktu mulai (waktu_mulai)
    public function setWaktuMulaiAttribute($value)
    {
        $this->attributes['waktu_mulai'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    // Setter untuk waktu selesai (waktu_selesai)
    public function setWaktuSelesaiAttribute($value)
    {
         $waktuMulai = $this->attributes['waktu_mulai'] ?? $this->waktu_mulai; // Ambil waktu mulai yang sudah ada atau yang tersimpan
         $waktuSelesai = Carbon::parse($value);

        if ($waktuMulai instanceof Carbon) {
             if ($waktuSelesai->lte($waktuMulai)) {
                 throw new \InvalidArgumentException('Waktu selesai harus setelah waktu mulai.');
             }
         } else {
             $waktuMulaiCarbon = Carbon::parse($waktuMulai);
              if ($waktuSelesai->lte($waktuMulaiCarbon)) {
                  throw new \InvalidArgumentException('Waktu selesai harus setelah waktu mulai.');
              }
         }

         $this->attributes['waktu_selesai'] = $waktuSelesai->format('Y-m-d H:i:s'); // Format tanggalnya
    }
}
