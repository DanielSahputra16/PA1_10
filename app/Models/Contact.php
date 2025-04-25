<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'operating_hours',
        'whatsapp_link',
        'instagram_username',
        'embed_code',
    ];
}
