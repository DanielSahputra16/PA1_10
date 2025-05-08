<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function indexPublic()
    {
        $menu = Menu::all();
        return view('Menu.index', compact('menu'));
    }

    public function index()
    {
        $menu = Menu::all();
        return view('admin.Menu.index', compact('menu'));
    }

    public function create()
    {
        return view('admin.Menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:lapangan,alat,fasilitas', // Validasi jenis
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        Menu::create($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        return view('admin.Menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.Menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'jenis' => 'required|in:lapangan,alat,fasilitas', // Validasi jenis
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama (jika ada)
            if ($menu->gambar) {
                Storage::delete('public/menus/' . $menu->gambar); // Path konsisten
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        $menu->update($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        // Hapus gambar (jika ada)
        if ($menu->gambar) {
            Storage::delete('public/menus/' . $menu->gambar);
        }

        // Hapus data menu dari database
        $menu->delete();

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
