<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function indexPublic()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));  // Diubah
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));  // Diubah
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');  // Diubah
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string',
        ]);

        Contact::create($request->all());

        return redirect()->route('admin.contacts.index') // Diubah
                        ->with('success','Contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show',compact('contact')); // Diubah
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit',compact('contact')); // Diubah
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string',
        ]);

        $contact->update($request->all());

        return redirect()->route('admin.contacts.index') // Diubah
                        ->with('success','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index') // Diubah
                        ->with('success','Contact deleted successfully');
    }
}
