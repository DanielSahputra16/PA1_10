<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactInfo::first();

        return view('contact.index', ['contact' => $contact]);
    }
}

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::firstOrCreate();  // Lebih ringkas dan efisien

        return view('admin.contact_info.edit', compact('contactInfo'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:20',
            'operational_hours' => 'required|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:100',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $contactInfo = ContactInfo::firstOrCreate(); // Pastikan selalu ada

        $contactInfo->fill($request->only([ // Lebih aman dan ringkas
            'phone_number',
            'operational_hours',
            'whatsapp_link',
            'instagram_username',
            'address',
            'latitude',
            'longitude',
        ]));

        $contactInfo->save();

        return redirect()->route('admin.contact_info.index')->with('success', 'Contact information updated successfully.');
    }

}
