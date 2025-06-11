<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory; // Trait untuk factory agar mudah membuat data dummy/testing

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',   // ID user yang membuat atau terkait dengan menu ini
        'judul',     // Judul nama menu
        'deskripsi', // Deskripsi singkat menu
        'gambar',    // Path atau nama file gambar menu
        'jenis',     // Jenis menu (misalnya makanan, minuman, dll)
        'stok',
        'detail',
    ];

    /**
     * Relasi ke User.
     * Setiap menu dibuat oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
