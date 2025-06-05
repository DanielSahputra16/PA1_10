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
use Illuminate\Support\Facades\Auth; // Impor facade Auth

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     *
     * @return View
     */
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(6);
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Remove the specified testimonial from storage.
     *
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        Log::info('TestimonialController@destroy dijalankan');
        Log::info('User ID yang login: ' . auth()->user()->id);
        Log::info('Testimonial ID yang akan dihapus: ' . $testimonial->id);
        Log::info('Testimonial User ID: ' . $testimonial->user_id);

        // Otorisasi di sini!
        if (auth()->user()->id !== $testimonial->user_id && !auth()->user()->isAdmin()) {
            Log::warning('Otorisasi ditolak di TestimonialController@destroy');
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimonial ini.');
        }

        try {
            $testimonial->delete();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus testimonial: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'Gagal menghapus testimonial. Silakan coba lagi.']);
        }
    }

     /**
     * Display a listing of testimonials.
     *
     * @return View
     */
    public function indexAdmin(): View
    {
        $testimonials = Testimonial::latest()->paginate(6);
        return view('admin.testimonials.index', compact('testimonials'));
    }

     /**
     * Remove the specified testimonial from storage.
     *
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroyAdmin(Testimonial $testimonial): RedirectResponse
    {
        Log::info('TestimonialController@destroy dijalankan');
        Log::info('User ID yang login: ' . auth()->user()->id);
        Log::info('Testimonial ID yang akan dihapus: ' . $testimonial->id);
        Log::info('Testimonial User ID: ' . $testimonial->user_id);

        // Otorisasi di sini!
        if (!auth()->user()->isAdmin()) {
            Log::warning('Otorisasi ditolak di TestimonialController@destroy');
            abort(403, 'Anda tidak memiliki izin untuk menghapus testimonial ini.');
        }

        try {
            $testimonial->delete();
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus testimonial: ' . $e->getMessage());
            return Redirect::back()->withErrors(['error' => 'Gagal menghapus testimonial. Silakan coba lagi.']);
        }
    }

    public function create(): View
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            $validatedData['user_id'] = auth()->id();
            Log::info('Data sebelum disimpan: ' . json_encode($validatedData)); // Tambahkan log ini
            $testimonial = Testimonial::create($validatedData);
            Log::info('Testimonial berhasil disimpan dengan ID: ' . $testimonial->id); // Tambahkan log ini

            return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Gagal menyimpan testimonial: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString()); // Tambahkan log ini
            return redirect()->route('testimonials.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
