<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Menampilkan daftar kontak di frontend
    public function indexPublic()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Menampilkan daftar kontak di admin
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    // Menampilkan form untuk membuat kontak baru di admin
    public function create()
    {
        return view('admin.contact.create');
    }

    // Menyimpan kontak baru di admin
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Menambahkan user_id

        Contact::create($data);

        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil dibuat.');
    }

    // Menampilkan detail kontak di admin
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    // Menampilkan form untuk mengedit kontak di admin
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    // Memperbarui kontak di admin
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Menambahkan user_id

        $contact->update($data);

        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil diperbarui.');
    }

    // Menghapus kontak di admin
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil dihapus.');
    }
}
