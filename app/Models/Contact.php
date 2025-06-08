<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Field yang boleh diisi massal (mass assignment)
    protected $fillable = [
        'user_id',           // ID user yang memiliki data kontak ini
        'phone_number',      // Nomor telepon kontak
        'operating_hours',   // Jam operasional (misal: Senin-Jumat 09:00-17:00)
        'whatsapp_link',     // Link WhatsApp untuk kontak langsung
        'instagram_username',// Username Instagram untuk kontak sosial media
        'embed_code',        // Kode embed (misal peta atau widget)
    ];

    // Relasi ke User: setiap kontak dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
