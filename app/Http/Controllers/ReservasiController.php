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
        return view('reservasi.create', compact('lapangans'));
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

        // Validasi input
        $validator = Validator::make($request->all(), [
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal_mulai' => [
                'required',
                'date',
                'after_or_equal:today', // Tidak boleh tanggal lampau
                'before_or_equal:' . now()->addMonths(2)->format('Y-m-d'), // Max 2 bulan ke depan
                function ($attribute, $value, $fail) use ($currentYear) {
                    // Validasi tambahan agar tahun tidak lebih dari tahun saat ini
                    if (Carbon::parse($value)->year > $currentYear) {
                        $fail('Tahun pada tanggal mulai tidak boleh melebihi tahun ini.');
                    }
                },
            ],
            'jam_mulai' => 'required',
            'tanggal_selesai' => 'required|date|same:tanggal_mulai',
            'jam_selesai' => 'required',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:13',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Gabungkan tanggal dan jam ke bentuk datetime
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai . ' ' . $request->jam_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai . ' ' . $request->jam_selesai);

        // Cek apakah lapangan sudah dipesan pada jam tersebut
        $overlappingReservations = Reservasi::where('lapangan_id', $request->lapangan_id)
            ->where(function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhere(function ($q) use ($tanggal_mulai, $tanggal_selesai) {
                          $q->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                      });
            });

        // Jika update, abaikan dirinya sendiri
        if ($reservasi) {
            $overlappingReservations->where('id', '!=', $reservasi->id);
        }

        // Jika ada bentrok jadwal
        if ($overlappingReservations->count() > 0) {
            return back()->withErrors(['message' => 'Jadwal telah dipesan pada jam berikut.']);
        }

        // Jika belum ada, buat baru. Kalau ada, pakai data lama
        if (!$reservasi) {
            $reservasi = new Reservasi();
            $reservasi->user_id = auth()->user()->id;
        }

        // Set data reservasi
        $reservasi->lapangan_id = $request->lapangan_id;
        $reservasi->tanggal_mulai = $tanggal_mulai;
        $reservasi->tanggal_selesai = $tanggal_selesai;
        $reservasi->nama = $request->nama;
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
            ->where('tanggal_mulai', '>', $now)
            ->where('tanggal_mulai', '<=', $now->copy()->addHours(24))
            ->get();

        foreach ($reservations as $reservation) {
            if ($reservation->user) {
                \Log::info("Pengingat dikirim ke: " . $reservation->user->email . " untuk reservasi #" . $reservation->id);
                // Mail::to($reservation->user->email)->send(new ReminderEmail($reservation));
            } else {
                \Log::warning("Tidak dapat mengirim pengingat untuk reservasi #" . $reservation->id);
            }
        }
    }
}
