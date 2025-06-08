<?php

namespace App\Http\Controllers;

// Import model dan pustaka yang dibutuhkan
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    /**
     * Menampilkan galeri untuk publik (frontend)
     */
    public function indexPublic()
    {
        $galleries = Galeri::all(); // Ambil semua data galeri
        return view('galeri.index', compact('galleries')); // Tampilkan ke view frontend
    }

    /**
     * Menampilkan galeri di halaman admin
     */
    public function index()
    {
        $galleries = Galeri::all(); // Ambil semua galeri
        return view('admin.Galeri.index', compact('galleries')); // Kirim ke view admin
    }

    /**
     * Tampilkan form input galeri baru
     */
    public function create()
    {
        return view('admin.Galeri.create'); // Tampilkan form tambah galeri
    }

    /**
     * Simpan galeri baru ke database
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Wajib upload gambar
        ]);

        // Simpan gambar ke folder storage/app/public/images/galeri
        $imagePath = $request->file('image')->store('images/galeri', 'public');

        // Simpan data galeri ke database
        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => basename($imagePath), // Simpan hanya nama file
            'user_id' => Auth::id(), // Catat user yang mengunggah
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit galeri
     */
    public function edit(Galeri $galeri)
    {
        return view('admin.Galeri.edit', compact('galeri')); // Kirim data ke form edit
    }

    /**
     * Perbarui data galeri yang sudah ada
     */
    public function update(Request $request, Galeri $galeri)
    {
        // Validasi form
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar boleh kosong
        ]);

        // Siapkan data untuk update
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Jika ada gambar baru diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete('images/galeri/' . $galeri->image_path);

            // Upload gambar baru
            $imagePath = $request->file('image')->store('images/Galeri', 'public');
            $data['image_path'] = basename($imagePath);
        }

        $data['user_id'] = Auth::id(); // Update user_id (siapa yang terakhir mengubah)

        $galeri->update($data); // Simpan perubahan

        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    /**
     * Hapus galeri dari database dan storage
     */
    public function destroy(Galeri $galeri)
    {
        // Hapus file gambar dari storage
        Storage::disk('public')->delete('images/galeri/' . $galeri->image_path);

        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
