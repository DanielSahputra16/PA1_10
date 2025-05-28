<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource for the admin side.
     */
    public function indexPublic()
    {
        $abouts = About::all();
        $contacts = Contact::all();
        return view('About.index', compact('abouts', 'contacts'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $abouts = About::all();
        return view('admin.About.index', compact('abouts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.About.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:abouts,judul', // Tambahkan validasi unique (opsional)
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images/abouts', 'public');
            $input['gambar'] = $gambarPath;
        }

        $input['user_id'] = Auth::id(); // Menambahkan user_id

        About::create($input);

        return redirect()->route('admin.About.index')
            ->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.About.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        try {
            $about = \App\Models\About::findOrFail($about->id);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
        }

        return view('admin.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'judul' => 'required|unique:abouts,judul,' . $about->id,
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            if ($about->gambar) {
                Storage::disk('public')->delete($about->gambar);
            }

            $gambarPath = $request->file('gambar')->store('images/abouts', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $input['user_id'] = Auth::id(); // Menambahkan user_id

        $about->update($input);

        return redirect()->route('admin.About.index')
            ->with('success', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        \Log::info('Attempting to delete About with ID: ' . $about->id);

        \DB::beginTransaction();

        try {
            if ($about->gambar) {
                \Log::info('Deleting image: ' . $about->gambar);
                \Storage::disk('public')->delete($about->gambar);
                \Log::info('Image deleted successfully.');
            }

            $about->delete();
            \Log::info('About deleted successfully from database.');

            \DB::commit();
            \Log::info('Transaction committed.');

            return redirect()->route('admin.About.index')
                ->with('success', 'About deleted successfully.');
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('Error deleting About: ' . $e->getMessage());
            return redirect()->route('admin.About.index')
                ->with('error', 'Error deleting About: ' . $e->getMessage());
        }
    }
}
