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
    public function index(Request $request): View
    {
        $testimonials = Testimonial::latest()->paginate(6);
        // Periksa apakah request berasal dari admin
        if ($request->is('admin/*')) {
            return view('admin.testimonials.index', compact('testimonials'));
        } else {
            return view('testimonials.index', compact('testimonials'));
        }
    }

    /**
     * Show the form for creating a new testimonial.
     *
     * @return View
     */
    public function create(): View
    {
        // Hanya user yang login yang bisa mengakses halaman create
        // Tidak perlu Policy lagi!
        return view('testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
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

    /**
     * Display the specified testimonial.
     *
     * @param  Testimonial  $testimonial
     * @return View
     */
    public function show(Request $request, Testimonial $testimonial): View
    {
        // Periksa apakah request berasal dari admin
        if ($request->is('admin/*')) {
            return view('admin.testimonials.show', compact('testimonial'));
        } else {
            return view('testimonials.show', compact('testimonial'));
        }
    }

    /**
     * Show the form for editing the specified testimonial.
     *
     * @param  Testimonial  $testimonial
     * @return View
     */
    public function edit(Request $request, Testimonial $testimonial): View
    {
        // Otorisasi di sini!
        if (auth()->user()->id !== $testimonial->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah testimonial ini.');
        }

        // Periksa apakah request berasal dari admin
        if ($request->is('admin/*')) {
            return view('admin.testimonials.edit', compact('testimonial'));
        } else {
            return view('testimonials.edit', compact('testimonial'));
        }
    }

    /**
     * Update the specified testimonial in storage.
     *
     * @param  Request  $request
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        // Otorisasi di sini!
        if (auth()->user()->id !== $testimonial->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak memiliki izin untuk mengubah testimonial ini.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Redirect::route('testimonials.edit', $testimonial->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $testimonial->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);

            if ($request->is('admin/*')) {
                return Redirect::route('admin.testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
            } else {
                return Redirect::route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
            }

        } catch (QueryException $e) {
            Log::error('Gagal menyimpan testimonial (database error): ' . $e->getMessage());
            return Redirect::route('testimonials.create')
                ->with('error', 'Terjadi kesalahan database. Silakan coba lagi.')
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui testimonial: ' . $e->getMessage());
            if ($request->is('admin/*')) {
                return Redirect::route('admin.testimonials.edit', $testimonial->id)
                    ->with('error', 'Terjadi kesalahan saat memperbarui testimonial. Silakan coba lagi.');
            } else {
                return Redirect::route('testimonials.edit', $testimonial->id)
                    ->with('error', 'Terjadi kesalahan saat memperbarui testimonial. Silakan coba lagi.');
            }
        }
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
}
