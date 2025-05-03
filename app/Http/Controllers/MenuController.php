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
        return view('menu.index', compact('menu'));
    }

    public function index()
    {
        $menu = Menu::all();
        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        return view('admin.Menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
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
        try {
            Storage::delete('public/menus/' . $menu->gambar);
        } catch (\Exception $e) {
            \Log::error('Failed to delete image: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus gambar: ' . $e->getMessage());
        }
    }

    // Hapus data menu
    try {
        $menu->delete();
        dd('Data menu berhasil dihapus dari database!'); // Tambahkan ini
        return redirect()->route('admin.Menu.index')->with('success', 'Menu berhasil dihapus.');
    } catch (\Exception $e) {
        \Log::error('Failed to delete menu data: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus menu: ' . $e->getMessage());
    }
}
}
