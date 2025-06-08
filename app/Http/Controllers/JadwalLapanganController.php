<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JadwalLapanganController extends Controller
{
    /**
     * Terapkan middleware auth agar semua route hanya bisa diakses oleh user yang login
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan jadwal lapangan ke halaman publik
     */
    public function indexPublic()
    {
        $jadwalLapangans = JadwalLapangan::all();
        return view('jadwal.index', compact('jadwalLapangans'));
    }

    /**
     * Tampilkan semua jadwal lapangan ke halaman admin
     */
    public function index()
    {
        $jadwalLapangans = JadwalLapangan::all();
        return view('admin.jadwal_lapangan.index', compact('jadwalLapangans'));
    }

    /**
     * Tampilkan form input jadwal baru
     */
    public function create()
    {
        return view('admin.jadwal_lapangan.create');
    }

    /**
     * Simpan jadwal baru ke database
     */
    public function store(Request $request)
    {
        return $this->saveJadwalLapangan($request); // Gunakan fungsi khusus untuk menyimpan
    }

    /**
     * Tampilkan detail satu jadwal
     */
    public function show(JadwalLapangan $jadwalLapangan)
    {
        return view('admin.jadwal_lapangan.show', compact('jadwalLapangan'));
    }

    /**
     * Tampilkan form edit jadwal
     */
    public function edit(JadwalLapangan $jadwalLapangan)
    {
        return view('admin.jadwal_lapangan.edit', compact('jadwalLapangan'));
    }

    /**
     * Simpan perubahan pada jadwal
     */
    public function update(Request $request, JadwalLapangan $jadwalLapangan)
    {
        return $this->saveJadwalLapangan($request, $jadwalLapangan);
    }

    /**
     * Hapus jadwal dari database
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

    /**
     * Fungsi reusable untuk membuat dan mengedit jadwal lapangan
     */
    private function saveJadwalLapangan(Request $request, JadwalLapangan $jadwalLapangan = null)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addMonths(2)->format('Y-m-d'),
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lapangan_1' => 'required|boolean',
            'lapangan_2' => 'required|boolean',
        ]);

        // Jika gagal validasi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Gabungkan tanggal dan jam ke dalam format datetime
        $waktu_mulai = Carbon::parse($request->tanggal . ' ' . $request->jam_mulai);
        $waktu_selesai = Carbon::parse($request->tanggal . ' ' . $request->jam_selesai);

        // Validasi bahwa waktu mulai < waktu selesai
        if($waktu_mulai->greaterThanOrEqualTo($waktu_selesai)) {
            return redirect()->back()
                ->withErrors(['jam_mulai' => 'Jam mulai harus lebih kecil dari jam selesai.'])
                ->withInput();
        }

        // Cek apakah ada jadwal lain yang bentrok waktunya
        $overlapping = JadwalLapangan::where(function($q) use($waktu_mulai, $waktu_selesai){
                                    $q->whereBetween('waktu_mulai', [$waktu_mulai, $waktu_selesai])
                                      ->orWhereBetween('waktu_selesai', [$waktu_mulai, $waktu_selesai]);
                                })
                                ->when($jadwalLapangan, function($q) use($jadwalLapangan){
                                    $q->where('id','!=', $jadwalLapangan->id); // Kecuali jika sedang update data yang sama
                                })
                                ->count();

        if($overlapping > 0){
            return redirect()->back()
                ->withErrors(['jam_mulai' => 'Sudah ada jadwal lain pada jam tersebut.'])
                ->withInput();
        }

        // Jika sedang mengedit, gunakan data lama
        if ($jadwalLapangan) {
            $jadwalLapangan->fill($request->only(['nama', 'lapangan_1', 'lapangan_2']));
        } else {
            $jadwalLapangan = new JadwalLapangan($request->only(['nama', 'lapangan_1', 'lapangan_2']));
        }

        // Simpan informasi waktu dan user yang input
        $jadwalLapangan->waktu_mulai = $waktu_mulai;
        $jadwalLapangan->waktu_selesai = $waktu_selesai;
        $jadwalLapangan->user_id = Auth::id();
        $jadwalLapangan->save();

        // Redirect ke halaman utama
        return redirect()->route('admin.jadwal_lapangan.index')
            ->with('success', 'Jadwal Lapangan berhasil diperbarui.');
    }
}
