<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // Tanggal yang dipilih (default: hari ini)
        $tanggalDipilih = $request->input('tanggal', Carbon::now()->toDateString());
        $tanggal = Carbon::parse($tanggalDipilih);

        // Daftar lapangan
        $lapangans = Lapangan::all();

        // Jam operasional
        $jamBuka = 7;
        $jamTutup = 22;

        // Kirim data ke view
        return view('jadwal.index', compact('lapangans', 'tanggal', 'jamBuka', 'jamTutup'));
    }
}
