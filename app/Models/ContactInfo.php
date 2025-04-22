<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';
    protected $fillable = [
        'phone_number',
        'operational_hours',
        'whatsapp_link',
        'instagram_username',
        'address',
        'latitude',
        'longitude',
    ];

    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan
}
