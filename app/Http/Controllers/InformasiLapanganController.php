<?php

namespace App\Http\Controllers;

use App\Models\InformasiLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiLapanganController extends Controller
{
    public function index()
    {
        $lapangans = InformasiLapangan::all();
        return view('informasi_lapangans.index', compact('lapangans'));
    }

    public function create()
    {
        return view('informasi_lapangans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('lapangans', 'public');

        InformasiLapangan::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('informasi-lapangans.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $lapangan = InformasiLapangan::findOrFail($id);
        return view('informasi_lapangans.show', compact('lapangan'));
    }

    public function edit($id)
    {
        $lapangan = InformasiLapangan::findOrFail($id);
        return view('informasi_lapangans.edit', compact('lapangan'));
    }

    public function update(Request $request, $id)
    {
        $lapangan = InformasiLapangan::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lapangans', 'public');
            $lapangan->image_path = $imagePath;
        }

        $lapangan->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('informasi-lapangans.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $lapangan = InformasiLapangan::findOrFail($id);

        if ($lapangan->image_path) {
            Storage::disk('public')->delete($lapangan->image_path);
        }

        $lapangan->delete();

        return redirect()->route('informasi-lapangans.index')->with('success', 'Data berhasil dihapus!');
    }
}
