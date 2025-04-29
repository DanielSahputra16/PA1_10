<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class MenuController extends Controller
{
        public function indexPublic()
    {
        $menu = Menu::all();
        return view('Menu.index', compact('menu')); // Perbaikan!
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();
        return view('admin.Menu.index', compact('menu')); // Perbaikan!
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255', //Tambahkan Validasi String
            'deskripsi' => 'required|string', //Tambahkan Validasi String
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar); // Simpan di storage/app/public/menus <-- PERUBAHAN DI SINI
            $data['gambar'] = $nama_gambar;
        }

        Menu::create($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('admin.Menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.Menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'judul' => 'required|string|max:255', //Tambahkan Validasi String
            'deskripsi' => 'required|string', //Tambahkan Validasi String
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama (jika ada)
            if ($menu->gambar) {
                Storage::delete('public/menus/' . $menu->gambar); // <-- PERUBAHAN DI SINI
            }

            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->storeAs('public/menus', $nama_gambar); // Simpan di storage/app/public/menus <-- PERUBAHAN DI SINI
            $data['gambar'] = $nama_gambar;
        }

        $menu->update($data);

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Hapus gambar (jika ada)
        if ($menu->gambar) {
            Storage::delete('public/menus/' . $menu->gambar); // <-- PERUBAHAN DI SINI
        }

        $menu->delete();

        return redirect()->route('admin.Menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
