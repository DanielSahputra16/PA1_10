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
use Illuminate\Database\Eloquent\Collection;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     *
     * @return View
     */
    public function index(): View
{
    try {
        $testimonials = Testimonial::latest()->paginate(10); // Ambil *semua* testimonial (tanpa filter approved)
        if (!($testimonials instanceof Collection)) {
             $testimonials = collect([]);
        }
    } catch (\Exception $e) {
        Log::error('Error retrieving testimonials: ' . $e->getMessage());
        $testimonials = collect([]); // Ensure $testimonials is always a collection
    }

    return view('testimonials.index', compact('testimonials'));
}

    /**
     * Show the form for creating a new testimonial.
     *
     * @return View
     */
    public function create(): View
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'your_name' => 'required|string|max:255',
            'your_email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return Redirect::route('testimonials.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Testimonial::create([
                'name' => $request->input('your_name'),
                'email' => $request->input('your_email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);

            return Redirect::route('testimonials.index')->with('success', 'Terima kasih! Testimonial Anda telah berhasil dikirim.');

        }  catch (QueryException $e) {
            Log::error('Gagal menyimpan testimonial (database error): ' . $e->getMessage());
            return Redirect::route('testimonials.create')
                ->with('error', 'Terjadi kesalahan database. Silakan coba lagi.')
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan testimonial (general error): ' . $e->getMessage());
            return Redirect::route('testimonials.create')
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Display the specified testimonial.
     *
     * @param  Testimonial  $testimonial
     * @return View
     */
    public function show(Testimonial $testimonial): View
    {
        // Tampilkan detail testimonial
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified testimonial.
     *
     * @param  Testimonial  $testimonial
     * @return View
     */
    public function edit(Testimonial $testimonial): View
    {
        return view('testimonials.edit', compact('testimonial'));
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
        $validator = Validator::make($request->all(), [
            'your_name' => 'required|string|max:255',
            'your_email' => 'required|email|max:255',
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
                'name' => $request->input('your_name'),
                'email' => $request->input('your_email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);

            return Redirect::route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');

        }  catch (QueryException $e) {
            Log::error('Gagal menyimpan testimonial (database error): ' . $e->getMessage());
            return Redirect::route('testimonials.create')
                ->with('error', 'Terjadi kesalahan database. Silakan coba lagi.')
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui testimonial: ' . $e->getMessage());
            return Redirect::route('testimonials.edit', $testimonial->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui testimonial. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified testimonial from storage.
     *
     * @param  Testimonial  $testimonial
     * @return RedirectResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            $testimonial->delete();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
             \Log::error('Gagal menghapus testimonial: ' . $e->getMessage());

            return Redirect::back()->withErrors(['error' => 'Gagal menghapus testimonial. Silakan coba lagi.']);
        }
    }
}
