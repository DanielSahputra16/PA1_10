<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Menampilkan semua menu ke halaman publik
     */
    public function indexPublic()
    {
        $menu = Menu::all();
        return view('Menu.index', compact('menu'));
    }

    /**
     * Menampilkan semua menu di halaman admin
     */
    public function index()
    {
        $menu = Menu::all();
        return view('admin.Menu.index', compact('menu'));
    }

    /**
     * Menampilkan form tambah menu baru
     */
    public function create()
    {
        return view('admin.Menu.create');
    }

    /**
     * Menyimpan menu baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis' => 'required|in:lapangan,alat,fasilitas',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Simpan gambar jika diupload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        // Set user_id ke user yang login
        $data['user_id'] = Auth::id();

        // Simpan ke database
        Menu::create($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu menu
     */
    public function show(Menu $menu)
    {
        return view('admin.Menu.show', compact('menu'));
    }

    /**
     * Menampilkan form edit menu
     */
    public function edit(Menu $menu)
    {
        return view('admin.Menu.edit', compact('menu'));
    }

    /**
     * Menyimpan perubahan pada menu
     */
    public function update(Request $request, Menu $menu)
    {
        // Validasi input
        $request->validate([
            'jenis' => 'required|in:lapangan,alat,fasilitas',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Update gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($menu->gambar) {
                Storage::delete('public/menus/' . $menu->gambar);
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->storeAs('public/menus', $nama_gambar);
            $data['gambar'] = $nama_gambar;
        }

        // Update user_id ke user yang login
        $data['user_id'] = Auth::id();

        // Update data menu
        $menu->update($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Menghapus menu dari database
     */
    public function destroy(Menu $menu)
    {
        // Hapus gambar jika ada
        if ($menu->gambar) {
            Storage::delete('public/menus/' . $menu->gambar);
        }

        // Hapus record dari database
        $menu->delete();

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
