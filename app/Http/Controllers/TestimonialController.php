<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth; // Facade untuk autentikasi user

class TestimonialController extends Controller
{
    /**
     * Menampilkan daftar testimonial untuk user biasa (halaman depan)
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil data testimonial terbaru, paginasi 6 per halaman
        $testimonials = Testimonial::latest()->paginate(6);
        // Tampilkan view testimonials.index dengan data testimonials
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Menghapus testimonial tertentu, hanya bisa dilakukan oleh pemilik atau admin
     *
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        // Log informasi eksekusi untuk debugging
        Log::info('TestimonialController@destroy dijalankan');
        Log::info('User ID yang login: ' . auth()->user()->id);
        Log::info('Testimonial ID yang akan dihapus: ' . $testimonial->id);
        Log::info('Testimonial User ID: ' . $testimonial->user_id);

        // Cek apakah user yang login adalah pemilik testimonial atau admin
        if (auth()->user()->id !== $testimonial->user_id && !auth()->user()->isAdmin()) {
            Log::warning('Otorisasi ditolak di TestimonialController@destroy');
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimonial ini.');
        }

        try {
            // Hapus testimonial
            $testimonial->delete();
            // Redirect ke halaman testimonial dengan pesan sukses
            return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika error, log error dan kembalikan ke halaman sebelumnya dengan pesan error
            Log::error('Gagal menghapus testimonial: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'Gagal menghapus testimonial. Silakan coba lagi.']);
        }
    }

    /**
     * Menampilkan daftar testimonial untuk halaman admin
     *
     * @return View
     */
    public function indexAdmin(): View
    {
        // Ambil testimonial terbaru untuk admin dengan pagination 6
        $testimonials = Testimonial::latest()->paginate(6);
        // Tampilkan view admin.testimonials.index dengan data testimonials
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Menghapus testimonial, hanya boleh dilakukan oleh admin (halaman admin)
     *
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroyAdmin(Testimonial $testimonial): RedirectResponse
    {
        // Log informasi eksekusi
        Log::info('TestimonialController@destroy dijalankan');
        Log::info('User ID yang login: ' . auth()->user()->id);
        Log::info('Testimonial ID yang akan dihapus: ' . $testimonial->id);
        Log::info('Testimonial User ID: ' . $testimonial->user_id);

        // Cek jika user yang login adalah admin
        if (!auth()->user()->isAdmin()) {
            Log::warning('Otorisasi ditolak di TestimonialController@destroy');
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimonial ini.');
        }

        try {
            // Hapus testimonial
            $testimonial->delete();
            // Redirect ke halaman admin testimonial dengan pesan sukses
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error jika gagal dan kembalikan dengan pesan error
            Log::error('Gagal menghapus testimonial: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'Gagal menghapus testimonial. Silakan coba lagi.']);
        }
    }

    /**
     * Tampilkan halaman form tambah testimonial baru
     *
     * @return View
     */
    public function create(): View
    {
        return view('testimonials.create');
    }

    /**
     * Simpan testimonial baru ke database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required',           // Nama wajib diisi
            'email' => 'required|email',    // Email wajib diisi dan format harus email
            'subject' => 'required',        // Subject wajib diisi
            'message' => 'required',        // Pesan wajib diisi
        ]);

        try {
            // Tambahkan user_id dari user yang sedang login
            $validatedData['user_id'] = auth()->id();
            // Log data yang akan disimpan (untuk debugging)
            Log::info('Data sebelum disimpan: ' . json_encode($validatedData));
            // Simpan data testimonial baru ke database
            $testimonial = Testimonial::create($validatedData);
            // Log berhasil simpan dengan ID
            Log::info('Testimonial berhasil disimpan dengan ID: ' . $testimonial->id);

            // Redirect ke halaman testimonial dengan pesan sukses
            return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan!');

        } catch (\Exception $e) {
            // Jika gagal simpan, log error dan kembalikan ke form dengan pesan error
            Log::error('Gagal menyimpan testimonial: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->route('testimonials.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
