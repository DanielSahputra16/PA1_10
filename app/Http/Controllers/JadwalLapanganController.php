<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Import Auth
use Carbon\Carbon;

class JadwalLapanganController extends Controller
{

    // Menerapkan middleware auth ke seluruh controller
    public function __construct()
    {
        $this->middleware('auth');
    }


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
       return $this->saveJadwalLapangan($request);
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
        return $this->saveJadwalLapangan($request, $jadwalLapangan);
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

    private function saveJadwalLapangan(Request $request, JadwalLapangan $jadwalLapangan = null)
    {
        // Validasi input
        $currentYear = now()->year;

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addMonths(2)->format('Y-m-d'),
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lapangan_1' => 'required|boolean',
            'lapangan_2' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Gabungkan tanggal dan jam menjadi format datetime
        $waktu_mulai = Carbon::parse($request->tanggal . ' ' . $request->jam_mulai);
        $waktu_selesai = Carbon::parse($request->tanggal . ' ' . $request->jam_selesai);

        if($waktu_mulai->greaterThanOrEqualTo($waktu_selesai)) {
                return redirect()->back()
                    ->withErrors(['jam_mulai' => 'Jam mulai harus lebih kecil dari jam selesai.'])
                    ->withInput();
        }

        //Cek Overlapping
          $overlapping = JadwalLapangan::where(function($q) use($waktu_mulai, $waktu_selesai){
                                        $q->whereBetween('waktu_mulai', [$waktu_mulai, $waktu_selesai])
                                          ->orWhereBetween('waktu_selesai', [$waktu_mulai, $waktu_selesai]);
                                        })
                                        ->when($jadwalLapangan, function($q) use($jadwalLapangan){
                                            $q->where('id','!=', $jadwalLapangan->id);
                                        })
                                        ->count();

          if($overlapping > 0){
                return redirect()->back()
                    ->withErrors(['jam_mulai' => 'Sudah ada jadwal lain pada jam tersebut.'])
                    ->withInput();
          }

        //Buat instance baru atau gunakan yang sudah ada
        if($jadwalLapangan){
             $jadwalLapangan->fill($request->only(['nama', 'lapangan_1', 'lapangan_2']));
        }else {
            $jadwalLapangan = new JadwalLapangan($request->only(['nama', 'lapangan_1', 'lapangan_2']));
        }

       $jadwalLapangan->waktu_mulai = $waktu_mulai;
       $jadwalLapangan->waktu_selesai = $waktu_selesai;
       $jadwalLapangan->user_id = Auth::id();
       $jadwalLapangan->save();


        return redirect()->route('admin.jadwal_lapangan.index')
            ->with('success', 'Jadwal Lapangan berhasil diperbarui.');
    }
}
