<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function indexPublic()
    {
        $galleries = Galeri::all();
        return view('galeri.index', compact('galleries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Galeri::all();
        return view('admin.Galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.Galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/galeri', 'public');

        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => basename($imagePath),
            'user_id' => Auth::id(), // Set user_id
        ]);

        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.Galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('images/galeri/' . $galeri->image_path);
            $imagePath = $request->file('image')->store('images/Galeri', 'public');
            $data['image_path'] = basename($imagePath);
        }

        $data['user_id'] = Auth::id(); //Update user_id jika gambar di update
        $galeri->update($data);

        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete('images/galeri/' . $galeri->image_path);
        $galeri->delete();

        return redirect()->route('admin.Galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
