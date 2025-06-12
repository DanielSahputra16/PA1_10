<?php

namespace App\Http\Controllers;

// Import model dan dependensi yang dibutuhkan
use App\Models\Lapangan;
use App\Models\Reservasi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Untuk transaksi database
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class ReservasiController extends Controller
{
    public function indexPublic()
    {
        // Jika user bukan admin, tampilkan hanya reservasi miliknya
        if (!auth()->user()->isAdmin()) {
            $reservasis = Reservasi::with(['lapangan', 'user'])
                ->where('user_id', auth()->id())
                ->get();
        } else {
            // Jika admin, tampilkan semua reservasi
            $reservasis = Reservasi::with(['lapangan', 'user'])->get();
           $reservasis = $reservasis->map(function ($reservasis) {
    $reservasis->waktu_mulai_formatted = \Carbon\Carbon::parse($reservasis->waktu_mulai)->translatedFormat('d F Y H:i');
    $reservasis->waktu_selesai_formatted = \Carbon\Carbon::parse($reservasis->waktu_selesai)->translatedFormat('d F Y H:i');
    return $reservasis;
});
        }

        // Tampilkan halaman reservasi user
        return view('reservasi.index', compact('reservasis'));
    }

    public function index()
    {
        // Menampilkan semua reservasi (untuk admin)
        $reservasis = Reservasi::with(['lapangan', 'user'])->get();
        return view('admin.reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        // Tampilkan form buat reservasi baru
        $lapangans = Lapangan::all(); // Ambil semua data lapangan
        $user = Auth::user(); // Ambil data user yang sedang login

        // Kirim data user ke view untuk mengisi form
        return view('reservasi.create', compact('lapangans', 'user'));
    }

    public function edit($id)
    {
        try {
            // Ambil data reservasi berdasarkan id
            $reservasi = Reservasi::findOrFail($id);
            $lapangans = Lapangan::all(); // Ambil semua data lapangan
            return view('reservasi.edit', compact('reservasi', 'lapangans'));
        } catch (ModelNotFoundException $e) {
            // Jika tidak ditemukan, arahkan kembali dengan pesan error
            return redirect()->route('reservasi.index')->with('error', 'Reservasi tidak ditemukan.');
        }
    }

    public function show($id)
    {
        // Menampilkan detail reservasi untuk user
        $reservasi = Reservasi::with(['lapangan', 'user'])->findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    public function showAdmin($id)
    {
        // Menampilkan detail reservasi untuk admin
        $reservasi = Reservasi::with(['lapangan', 'user'])->findOrFail($id);
        return view('admin.reservasi.show', compact('reservasi'));
    }

    public function store(Request $request)
    {
        // Simpan data reservasi baru
        return $this->saveReservasi($request, null); // null berarti buat baru
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        // Perbarui data reservasi yang ada
        return $this->saveReservasi($request, $reservasi);
    }

    // Fungsi utama untuk menyimpan atau memperbarui reservasi
    private function saveReservasi(Request $request, Reservasi $reservasi = null)
{
    $currentYear = now()->year; // Ambil tahun saat ini

    // Validasi input (tanpa nama)
    $rules = [
        'lapangan_id' => 'required|exists:lapangans,id',
        'tanggal' => [
            'required',
            'date',
            'after_or_equal:today',
            'before_or_equal:' . now()->addMonths(2)->format('Y-m-d'),
            function ($attribute, $value, $fail) use ($currentYear) {
                if (Carbon::parse($value)->year > $currentYear) {
                    $fail('Tahun pada tanggal mulai tidak boleh melebihi tahun ini.');
                }
            },
        ],
        'no_hp' => 'required|string|max:13',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    \Log::info($request->all()); // TAMBAHKAN BARIS INI UNTUK MELIHAT DATA YANG DIKIRIM

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Gabungkan tanggal dan jam ke bentuk datetime
    $tanggal = $request->tanggal; // Ambil tanggal dari request
    $waktu_mulai = Carbon::parse($tanggal . ' ' . $request->jam_mulai);
    $waktu_selesai = Carbon::parse($tanggal . ' ' . $request->jam_selesai);

    // Validasi bahwa waktu mulai < waktu selesai
    if($waktu_mulai->greaterThanOrEqualTo($waktu_selesai)) {
        return redirect()->back()
            ->withErrors(['jam_mulai' => 'Jam mulai harus lebih kecil dari jam selesai.'])
            ->withInput();
    }

    // Cek apakah ada jadwal lain yang bentrok waktunya pada tanggal yang sama
    $overlappingReservations = Reservasi::where('lapangan_id', $request->lapangan_id)
        ->whereDate('waktu_mulai', $tanggal) // Hanya cek pada tanggal yang sama
        ->where(function($q) use($waktu_mulai, $waktu_selesai){
            $q->whereBetween('waktu_mulai', [$waktu_mulai, $waktu_selesai])
              ->orWhereBetween('waktu_selesai', [$waktu_mulai, $waktu_selesai])
              ->orWhere(function($q) use ($waktu_mulai, $waktu_selesai){
                $q->where('waktu_mulai', '<=', $waktu_mulai)
                  ->where('waktu_selesai', '>=', $waktu_selesai);
              });
        });

    // Jika update, abaikan dirinya sendiri
    if ($reservasi) {
        $overlappingReservations->where('id', '!=', $reservasi->id);
    }

    // Jika ada bentrok jadwal
    if ($overlappingReservations->count() > 0) {
        return back()->withErrors(['message' => 'Jadwal telah dipesan pada jam tersebut di tanggal yang sama.']);
    }

    // Jika belum ada, buat baru. Kalau ada, pakai data lama
    if (!$reservasi) {
        $reservasi = new Reservasi();
        $reservasi->user_id = auth()->user()->id;
        $reservasi->nama = auth()->user()->name; // Set nama dari user yang login
    }

    // Upload gambar jika ada
    if ($request->hasFile('gambar')) {
        //Hapus gambar lama jika ada pada saat update
        if($reservasi && $reservasi->gambar){
            Storage::delete('public/gambar/' . $reservasi->gambar);
        }
        $gambar = $request->file('gambar');
        $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('public/gambar', $namaGambar); // Simpan di storage/app/public/gambar
        $reservasi->gambar = $namaGambar; // Simpan nama file ke database
    }

    // Set data reservasi
    $reservasi->lapangan_id = $request->lapangan_id;
    $reservasi->waktu_mulai = $waktu_mulai;
    $reservasi->waktu_selesai = $waktu_selesai;
    if (!$reservasi){
        $reservasi->nama = $request->nama;
    }
    $reservasi->no_hp = $request->no_hp;
    $reservasi->save();

    // Ambil ulang data lengkap dengan user untuk email
    $reservasi = Reservasi::with('user')->find($reservasi->id);

    // Kirim email jika reservasi baru, atau jika diperbarui
    if (!$reservasi) {
        $this->sendConfirmationEmail($reservasi);
    } else {
        $this->sendUpdateConfirmationEmail($reservasi);
    }

    return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ' . ($reservasi ? 'diperbarui' : 'dibuat') . '!');
}

    public function updateStatus(Request $request, Reservasi $reservasi)
    {
        // Validasi status baru
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan status baru
        $reservasi->status = $request->status;
        $reservasi->save();

        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
    }

    public function destroy(Reservasi $reservasi)
    {
        // Hanya pemilik atau admin yang boleh menghapus
        if (auth()->user()->id !== $reservasi->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak diizinkan membatalkan reservasi ini.');
        }

        // Gunakan transaksi agar proses aman
        DB::transaction(function () use ($reservasi) {
            $this->sendCancellationEmail($reservasi); // Kirim email pembatalan
            $reservasi->delete(); // Soft delete
        });

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!');
    }

    public function destroyAdmin(Reservasi $reservasi)
    {
        // Hapus oleh admin
        DB::transaction(function () use ($reservasi) {
            $this->sendCancellationEmail($reservasi);
            $reservasi->delete();
        });

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!');
    }

    // Mengirim email konfirmasi reservasi
    protected function sendConfirmationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email konfirmasi dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
            // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));
        } else {
            \Log::warning("Tidak dapat mengirim email konfirmasi untuk reservasi #" . $reservasi->id);
        }
    }

    // Mengirim email konfirmasi perubahan reservasi
    protected function sendUpdateConfirmationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email konfirmasi perubahan dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
            // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));
        } else {
            \Log::warning("Tidak dapat mengirim email perubahan untuk reservasi #" . $reservasi->id);
        }
    }

    // Mengirim email pembatalan reservasi
    protected function sendCancellationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email pembatalan dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
            // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));
        } else {
            \Log::warning("Tidak dapat mengirim email pembatalan untuk reservasi #" . $reservasi->id);
        }
    }

    // Kirim pengingat untuk reservasi yang akan dimulai dalam 24 jam
    public function sendReminderNotifications()
    {
        $now = Carbon::now();

        $reservations = Reservasi::with('user')
            ->where('tanggal', '>', $now)
            ->where('tanggal', '<=', $now->copy()->addHours(24))
            ->get();

        foreach ($reservations as $reservation) {
            if ($reservation->user) {
                \Log::info("Pengingat dikirim ke: " . $reservation->user->email . " untuk reservasi #" . $reservasi->id);
                // Mail::to($reservation->user->email)->send(new ReminderEmail($reservation));
            } else {
                \Log::warning("Tidak dapat mengirim pengingat untuk reservasi #" . $reservasi->id);
            }
        }
    }
}
