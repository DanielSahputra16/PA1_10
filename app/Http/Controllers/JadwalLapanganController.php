<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class JadwalLapanganController extends Controller
{
    public function indexPublic()
    {
        $jadwalLapangans = JadwalLapangan::all();
        return view('jadwal.index', compact('jadwalLapangans'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalLapangans = JadwalLapangan::all();
        return view('admin.jadwal_lapangan.index', compact('jadwalLapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jadwal_lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'waktu_mulai' => 'required|date_format:H:i',
                'waktu_selesai' => 'required|date_format:H:i',
                'lapangan_1' => 'required|boolean',
                'lapangan_2' => 'required|boolean',
            ]);

            JadwalLapangan::create($request->all());
            return redirect()->route('admin.jadwal_lapangan.index')
                ->with('success', 'Jadwal Lapangan berhasil ditambahkan.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error("Error creating jadwal lapangan: " . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menambahkan jadwal.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalLapangan $jadwalLapangan)
    {
        return view('admin.jadwal_lapangan.show', compact('jadwalLapangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalLapangan $jadwalLapangan)
    {
        return view('admin.jadwal_lapangan.edit', compact('jadwalLapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalLapangan $jadwalLapangan)
    {
        DB::beginTransaction(); // Mulai transaksi

        try {
            \Log::info("Attempting to update jadwal lapangan with ID: " . $jadwalLapangan->id);
            \Log::info("Request data: " . json_encode($request->all()));

            $request->validate([
                'nama' => 'required|string|max:255',
                'waktu_mulai' => 'required|date_format:H:i',
                'waktu_selesai' => 'required|date_format:H:i',
                'lapangan_1' => 'required|boolean',
                'lapangan_2' => 'required|boolean',
            ]);

            // Menggunakan array untuk memastikan hanya field yang valid yang diperbarui
            $data = $request->only(['nama', 'waktu_mulai', 'waktu_selesai', 'lapangan_1', 'lapangan_2']);
            $jadwalLapangan->update($data);

            DB::commit(); // Commit transaksi
            Log::info("Jadwal Lapangan updated successfully. Jadwal ID: " . $jadwalLapangan->id);

            return redirect()->route('admin.jadwal_lapangan.index')
                ->with('success', 'Jadwal Lapangan berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollback(); // Rollback transaksi
            Log::error("Validation error updating jadwal lapangan: " . $e->getMessage());
            \Log::info("Data yang diterima di update: " . json_encode($request->all()));
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();

        } catch (\Exception $e) {
            DB::rollback(); // Rollback transaksi
            Log::error("Error updating jadwal lapangan: " . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalLapangan $jadwalLapangan)
    {
        try {
            $jadwalLapangan->delete();
            return redirect()->route('admin.jadwal_lapangan.index')
                ->with('success', 'Jadwal Lapangan berhasil dihapus.');

        } catch (\Exception $e) {
            Log::error("Error deleting jadwal lapangan: " . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus jadwal.');
        }
    }
}
