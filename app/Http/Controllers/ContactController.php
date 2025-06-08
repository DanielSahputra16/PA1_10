<?php

namespace App\Http\Controllers;

// Import model dan class yang dibutuhkan
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // ======================== PUBLIC ========================

    /**
     * Menampilkan daftar semua kontak untuk pengunjung website (frontend)
     */
    public function indexPublic()
    {
        $contacts = Contact::all(); // Ambil semua data dari tabel contacts
        return view('contact.index', compact('contacts')); // Kirim data ke view contact.index
    }

    // ======================== ADMIN ========================

    /**
     * Menampilkan semua data kontak di halaman admin
     */
    public function index()
    {
        $contacts = Contact::all(); // Ambil semua kontak dari database
        return view('admin.contact.index', compact('contacts')); // Tampilkan view dengan data
    }

    /**
     * Menampilkan form untuk membuat kontak baru di halaman admin
     */
    public function create()
    {
        return view('admin.contact.create'); // Tampilkan form input kontak baru
    }

    /**
     * Menyimpan kontak baru ke database (dari form admin)
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'phone_number' => 'nullable|string|max:255', // Boleh kosong, teks maksimal 255 karakter
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string', // Biasanya untuk peta Google Maps
        ]);

        $data = $request->all(); // Ambil semua input form
        $data['user_id'] = Auth::id(); // Simpan ID user yang membuat kontak

        Contact::create($data); // Simpan ke database

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil dibuat.');
    }

    /**
     * Menampilkan detail satu kontak berdasarkan ID
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact')); // Tampilkan detail kontak
    }

    /**
     * Menampilkan form edit untuk mengubah data kontak
     */
    public function edit(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact')); // Tampilkan form edit dengan data yang sudah ada
    }

    /**
     * Memperbarui data kontak yang ada di database
     */
    public function update(Request $request, Contact $contact)
    {
        // Validasi input yang dikirimkan saat edit
        $request->validate([
            'phone_number' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'whatsapp_link' => 'nullable|string|max:255',
            'instagram_username' => 'nullable|string|max:255',
            'embed_code' => 'nullable|string',
        ]);

        $data = $request->all(); // Ambil data dari form
        $data['user_id'] = Auth::id(); // Update juga siapa yang terakhir mengubah

        $contact->update($data); // Simpan perubahan ke database

        // Redirect ke halaman daftar dengan pesan sukses
        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil diperbarui.');
    }

    /**
     * Menghapus data kontak dari database
     */
    public function destroy(Contact $contact)
    {
        $contact->delete(); // Hapus data dari database

        // Redirect ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('admin.contact.index')
                         ->with('success','Kontak berhasil dihapus.');
    }
}
