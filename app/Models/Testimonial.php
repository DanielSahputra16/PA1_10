<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
