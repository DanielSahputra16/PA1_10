<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk bekerja dengan file storage

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all(); // Atau paginate jika datanya banyak: Gallery::paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->storeAs('public/galleries', $imageName); // Simpan gambar ke storage/app/public/galleries

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // Simpan nama file saja, path sudah diatur di view
        ]);

        return redirect()->route('galleries.index')
                         ->with('success','Galeri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama (opsional)
            Storage::delete('public/galleries/'.$gallery->image);

            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/galleries', $imageName);
            $gallery->image = $imageName;
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')
                         ->with('success','Galeri berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar (opsional)
        Storage::delete('public/galleries/'.$gallery->image);

        $gallery->delete();

        return redirect()->route('galleries.index')
                         ->with('success','Galeri berhasil dihapus.');
    }
}
