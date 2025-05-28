<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'operating_hours',
        'whatsapp_link',
        'instagram_username',
        'embed_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
