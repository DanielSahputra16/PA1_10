<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactInfo::create([
            'phone_number' => '+62 899 256 8028',
            'operational_hours' => 'Senin - Minggu: 08:00 - 23:00 WIB',
            'whatsapp_link' => 'link_whatsapp_anda',
            'instagram_username' => 'ramos_badminton',
            'address' => 'Sitoluama, Sigumpar, Toba, North Sumatra 22382',
            'latitude' => 2.6475,
            'longitude' => 99.1480,
        ]);
    }
}
