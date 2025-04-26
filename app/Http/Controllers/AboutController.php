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
    public function indexpublic()
    {
        $Abouts = About::all();
        return view('admin.About.index', compact('Abouts'));
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
            'judul' => 'required|unique:Abouts,judul', // Tambahkan validasi unique (opsional)
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images/About', 'public');
            $input['gambar'] = $gambarPath;
        }

        About::create($input);

        return redirect()->route('admin.About.index')
            ->with('success', 'About created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $About)
    {
        return view('admin.About.show', compact('About'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $About)
    {
        return view('admin.About.edit', compact('About'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $About)
    {
        $request->validate([
            'judul' => 'required|unique:Abouts,judul,' . $About->id, // Tambahkan validasi unique (opsional)
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('gambar')) {
            if ($About->gambar) {
                Storage::disk('public')->delete($About->gambar);
            }

            $gambarPath = $request->file('gambar')->store('images/About', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $About->update($input);

        return redirect()->route('admin.Abouts.index')
            ->with('success', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $About)
    {
        DB::beginTransaction(); // Mulai transaksi

        try {
            if ($About->gambar) {
                Storage::disk('public')->delete($About->gambar);
            }

            $About->delete();

            DB::commit(); // Commit transaksi
        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaksi jika terjadi kesalahan
            throw $e; // Re-throw exception untuk penanganan lebih lanjut
        }

        return redirect()->route('admin.Abouts.index')
            ->with('success', 'About deleted successfully.');
    }
}
