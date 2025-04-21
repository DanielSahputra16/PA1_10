<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $galleries = Galeri::all();
    return view('admin.galeri.index', compact('galleries')); // folder juga sebaiknya huruf kecil
}

public function create()
{
    return view('admin.galeri.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = $request->file('image')->store('images/Galeri', 'public');

    Galeri::create([
        'title' => $request->title,
        'description' => $request->description,
        'image_path' => basename($imagePath),
    ]);

    return redirect()->route('admin.galeri.index')->with('success', 'Image added successfully.');
}

public function edit(Galeri $galeri)
{
    return view('admin.galeri.edit', compact('galeri'));
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
        Storage::disk('public')->delete('images/Galeri/' . $galeri->image_path);
        $imagePath = $request->file('image')->store('images/Galeri', 'public');
        $data['image_path'] = basename($imagePath);
    }

    $galeri->update($data);

    return redirect()->route('admin.galeri.index')->with('success', 'Image updated successfully.');
}

public function destroy(Galeri $galeri)
{
    Storage::disk('public')->delete('images/Galeri/' . $galeri->image_path);
    $galeri->delete();

    return redirect()->route('admin.galeri.index')->with('success', 'Image deleted successfully.');
}
}
