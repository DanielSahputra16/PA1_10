<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk transaksi

class AboutController extends Controller
{
    /**
     * Display a listing of the resource for the admin side.
     */
    public function indexPublic()
    {
        $abouts = About::all();
        return view('About.index', compact('abouts'));
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

        About::create($input);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return view('admin.About.show', compact('about')); // Perbaiki: menggunakan $about
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.About.edit', compact('about')); // Perbaiki: menggunakan $about
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'judul' => 'required|unique:abouts,judul,' . $about->id, // Tambahkan validasi unique (opsional)
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

        $about->update($input); // Perbaiki: menggunakan $about

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        DB::beginTransaction(); // Mulai transaksi

        try {
            if ($about->gambar) {
                Storage::disk('public')->delete($about->gambar);
            }

            $about->delete();

            DB::commit(); // Commit transaksi
        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaksi jika terjadi kesalahan
            throw $e; // Re-throw exception untuk penanganan lebih lanjut
        }

        return redirect()->route('admin.abouts.index')
            ->with('success', 'About deleted successfully.');
    }
}
