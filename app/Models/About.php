<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
