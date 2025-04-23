<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $users = User::all();
    return view('admin.users.index', compact('users'));
}
}

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();  // Asumsi hanya ada 1 record
        if (!$contactInfo) {
            $contactInfo = new ContactInfo(); // Buat instance baru jika belum ada
        }
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

        $contactInfo = ContactInfo::first();

        if (!$contactInfo) {
            $contactInfo = new ContactInfo();
        }

        $contactInfo->phone_number = $request->input('phone_number');
        $contactInfo->operational_hours = $request->input('operational_hours');
        $contactInfo->whatsapp_link = $request->input('whatsapp_link');
        $contactInfo->instagram_username = $request->input('instagram_username');
        $contactInfo->address = $request->input('address');
        $contactInfo->latitude = $request->input('latitude');
        $contactInfo->longitude = $request->input('longitude');

        $contactInfo->save();

        return redirect()->route('admin.contact_info.index')->with('success', 'Contact information updated successfully.');
    }

}
