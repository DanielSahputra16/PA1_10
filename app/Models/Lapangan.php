<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory; // Trait untuk memudahkan pembuatan data dummy/testing

    // Atribut yang dapat diisi massal (mass assignable)
    protected $fillable = ['nama']; // Nama lapangan

    /**
     * Relasi one-to-many ke model Reservasi.
     *
     * Satu lapangan bisa memiliki banyak reservasi.
     */
    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
