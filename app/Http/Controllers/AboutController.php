<?php

namespace App\Http\Controllers;

// Import model dan library yang dibutuhkan
use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman "Tentang Kami" untuk pengguna umum (public).
     */
    public function indexPublic()
    {
        // Ambil semua data dari tabel abouts dan contacts
        $abouts = About::all();
        $contacts = Contact::all();

        // Tampilkan halaman view 'About.index' dan kirimkan data abouts dan contacts
        return view('About.index', compact('abouts', 'contacts'));
    }

    /**
     * Menampilkan daftar data "Tentang Kami" di halaman admin.
     */
    public function index()
    {
        // Ambil semua data tentang kami
        $abouts = About::all();

        // Tampilkan view admin untuk data about
        return view('admin.About.index', compact('abouts'));
    }

    /**
     * Menampilkan form untuk membuat data "Tentang Kami" baru.
     */
    public function create()
    {
        // Tampilkan form untuk menambahkan data baru
        return view('admin.About.create');
    }

    /**
     * Menyimpan data baru "Tentang Kami" ke database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'judul' => 'required|unique:abouts,judul', // Judul harus diisi dan tidak boleh duplikat
            'deskripsi' => 'required', // Deskripsi wajib diisi
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048', // File gambar harus berupa image dan maksimal 2MB
        ]);

        // Ambil semua input dari form
        $input = $request->all();

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Simpan file gambar ke folder public/images/abouts
            $gambarPath = $request->file('gambar')->store('images/abouts', 'public');
            $input['gambar'] = $gambarPath; // Simpan path gambar ke dalam input
        }

        // Simpan ID user yang sedang login ke dalam data
        $input['user_id'] = Auth::id();

        // Simpan data ke database
        About::create($input);

        // Beri pesan sukses ke session
        Session::flash('success', 'Tentang kami berhasil dibuat.');

        // Redirect ke halaman daftar "Tentang Kami"
        return redirect()->route('admin.About.index');
    }

    /**
     * Menampilkan detail data "Tentang Kami" tertentu.
     */
    public function show(About $about)
    {
        // Tampilkan detail data ke view
        return view('admin.About.show', compact('about'));
    }

    /**
     * Menampilkan form edit data "Tentang Kami".
     */
    public function edit(About $about)
    {
        try {
            // Ambil data berdasarkan ID untuk memastikan data ada
            $about = \App\Models\About::findOrFail($about->id);
        } catch (\Exception $e) {
            // Jika gagal, catat error ke log
            Log::error('Error: ' . $e->getMessage());
        }

        // Tampilkan form edit dengan data yang sudah ada
        return view('admin.About.edit', compact('about'));
    }

    /**
     * Memperbarui data "Tentang Kami" yang sudah ada di database.
     */
    public function update(Request $request, About $about)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|unique:abouts,judul,' . $about->id, // Judul harus unik kecuali yang sedang diedit
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil semua input dari form
        $input = $request->all();

        // Cek apakah ada file gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            // Jika ada gambar lama, hapus dulu
            if ($about->gambar) {
                Storage::disk('public')->delete($about->gambar);
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('images/abouts', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            // Jika tidak ada gambar baru, hapus dari input agar tidak menimpa gambar lama
            unset($input['gambar']);
        }

        // Tambahkan ID user yang melakukan update
        $input['user_id'] = Auth::id();

        // Update data di database
        $about->update($input);

        // Tambahkan pesan sukses ke session
        Session::flash('success', 'Tentang kami berhasil diperbarui.');

        // Redirect kembali ke halaman daftar about
        return redirect()->route('admin.About.index');
    }

    /**
     * Menghapus data "Tentang Kami".
     */
    public function destroy(About $about)
    {
        // Tulis log bahwa penghapusan akan dilakukan
        \Log::info('Attempting to delete About with ID: ' . $about->id);

        // Mulai transaksi database
        \DB::beginTransaction();

        try {
            // Jika ada gambar, hapus dulu
            if ($about->gambar) {
                \Log::info('Deleting image: ' . $about->gambar);
                \Storage::disk('public')->delete($about->gambar);
                \Log::info('Image deleted successfully.');
            }

            // Hapus data dari database
            $about->delete();
            \Log::info('About deleted successfully from database.');

            // Commit transaksi jika semua proses berhasil
            \DB::commit();
            \Log::info('Transaction committed.');

            // Tambahkan pesan sukses
            Session::flash('success', 'Tentang kami berhasil dihapus.');

            // Redirect ke halaman daftar
            return redirect()->route('admin.About.index');

        } catch (\Exception $e) {
            // Jika terjadi kesalahan, rollback semua perubahan
            \DB::rollback();
            \Log::error('Error deleting About: ' . $e->getMessage());

            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()->route('admin.About.index')
                ->with('error', 'Gagal menghapus tentang kami: ' . $e->getMessage());
        }
    }
}
