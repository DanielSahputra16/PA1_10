<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Reservasi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //Import DB Facade

class ReservasiController extends Controller
{
    public function index()
    {
        // Eager load relasi 'lapangan' dan 'user'
        $reservasis = Reservasi::with(['lapangan', 'user'])->get(); //withTrashed()->get(); jika mau menampilkan yang softdeleted juga
        return view('reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat reservasi
        $lapangans = Lapangan::all();
        return view('reservasi.create', compact('lapangans'));
    }

    public function store(Request $request)
    {
        // Menyimpan reservasi baru
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'nama' => 'required|string|max:255', // Validasi nama
            'no_hp' => 'required|string|max:20',  // Validasi no_hp
        ]);

        // Cek ketersediaan
        $lapangan_id = $request->lapangan_id;
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);

        $overlappingReservations = Reservasi::where('lapangan_id', $lapangan_id)
            ->where(function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                      ->orWhere(function($q) use ($tanggal_mulai, $tanggal_selesai) {
                          $q->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                      });
            })
            ->count();

        if ($overlappingReservations > 0) {
            return back()->withErrors(['message' => 'Jadwal tidak tersedia.']);
        }

        $reservasi = new Reservasi();
        $reservasi->lapangan_id = $request->lapangan_id;
        $reservasi->tanggal_mulai = $request->tanggal_mulai;
        $reservasi->tanggal_selesai = $request->tanggal_selesai;
        $reservasi->user_id = auth()->user()->id; // Dapatkan ID pengguna yang login
        $reservasi->nama = $request->nama; // Simpan nama
        $reservasi->no_hp = $request->no_hp; // Simpan no_hp
        $reservasi->save();

        // Eager Load User setelah disimpan agar relasi tersedia untuk pengiriman email
        $reservasi = Reservasi::with('user')->find($reservasi->id);

        // Kirim email konfirmasi (contoh sederhana)
        $this->sendConfirmationEmail($reservasi);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibuat!');
    }

    public function show($id)
    {
        $reservasi = Reservasi::with(['lapangan', 'user'])->findOrFail($id);

        return view('reservasi.show', compact('reservasi'));
    }

    public function edit($reservasi)
    {
        try {
            // Mencari reservasi berdasarkan ID.  Jika tidak ditemukan, exception akan dilempar
            $reservasi = Reservasi::with('user')->findOrFail($reservasi);  // Eager load user di sini

            // Ambil data lapangan yang diperlukan untuk form edit (misalnya, daftar pilihan lapangan)
            $lapangans = Lapangan::all(); // Ambil semua lapangan

            // Memuat view edit dan meneruskan data reservasi dan lapangan ke view
            return view('reservasi.edit', compact('reservasi', 'lapangans'));

        } catch (ModelNotFoundException $e) {
            // Reservasi tidak ditemukan, redirect ke daftar reservasi dengan pesan error
            return redirect()->route('reservasi.index')->with('error', 'Reservasi tidak ditemukan.');
        }
    }

    public function update(Request $request, Reservasi $reservasi)
    {
    try {
        // Mengupdate reservasi
        $request->validate([
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'nama' => 'required|string|max:255', // Validasi nama
            'no_hp' => 'required|string|max:20',  // Validasi no_hp
        ]);

        // Cek ketersediaan
        $lapangan_id = $request->lapangan_id;
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);

        $overlappingReservations = Reservasi::where('lapangan_id', $lapangan_id)
            ->where('id', '!=', $reservasi->id) // Penting: exclude reservasi yang sedang di-update
            ->where(function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                    ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                    ->orWhere(function($q) use ($tanggal_mulai, $tanggal_selesai) {
                        $q->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                    });
            })
            ->count();

        if ($overlappingReservations > 0) {
            return back()->withErrors(['message' => 'Jadwal tidak tersedia.']);
        }

        $reservasi->lapangan_id = $request->lapangan_id;
        $reservasi->tanggal_mulai = $request->tanggal_mulai;
        $reservasi->tanggal_selesai = $request->tanggal_selesai;
        $reservasi->nama = $request->nama; // Simpan nama
        $reservasi->no_hp = $request->no_hp; // Simpan no_hp

        $reservasi->save();
            // Eager Load User setelah di-update agar relasi tersedia untuk pengiriman email
        $reservasi = Reservasi::with('user')->find($reservasi->id);
        // Kirim email konfirmasi update
        $this->sendUpdateConfirmationEmail($reservasi);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diupdate!');

    }  catch (ModelNotFoundException $e) {
        // Reservasi tidak ditemukan, redirect ke daftar reservasi dengan pesan error
        return redirect()->route('reservasi.index')->with('error', 'Reservasi tidak ditemukan.');
    }
    }

    public function destroy(Reservasi $reservasi)
    {

      // Gunakan DB::transaction untuk memastikan operasi atomik
      DB::transaction(function () use ($reservasi) {
        // Kirim email pembatalan SEBELUM di hapus
        $this->sendCancellationEmail($reservasi);
          if (auth()->check()){ //cek apakah user terautentikasi
                //Menghapus data reservasi
                $reservasi->forceDelete();   //untuk delete permanen
               // $reservasi->delete(); //Softdelete

                 return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!'); //kembalikan tampilan
            }

        });

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!');
    }

    protected function sendConfirmationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email konfirmasi dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
             //Kode Email Asli
             // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));

        } else {
            \Log::warning("Tidak dapat mengirim email konfirmasi untuk reservasi #" . $reservasi->id . ". Pengguna tidak ditemukan.");
            // Opsi:  Kirim email ke administrator dengan informasi reservasi jika penting
        }
    }

    protected function sendUpdateConfirmationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email konfirmasi perubahan dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
            //Kode Email Asli
            // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));
        } else {
            \Log::warning("Tidak dapat mengirim email perubahan konfirmasi untuk reservasi #" . $reservasi->id . ". Pengguna tidak ditemukan.");
             // Opsi:  Kirim email ke administrator dengan informasi reservasi jika penting
        }
    }

    protected function sendCancellationEmail(Reservasi $reservasi)
    {
        if ($reservasi->user) {
            \Log::info("Email pembatalan dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
             //Kode Email Asli
             // Mail::to($reservasi->user->email)->send(new ReservasiConfirmation($reservasi));
        } else {
            \Log::warning("Tidak dapat mengirim email pembatalan untuk reservasi #" . $reservasi->id . ". Pengguna tidak ditemukan.");
             // Opsi:  Kirim email ke administrator dengan informasi reservasi jika penting
        }
    }

    public function sendReminderNotifications()
    {
        $now = Carbon::now();
        $reservations = Reservasi::with('user') // Load relasi user di sini
                                ->where('tanggal_mulai', '>', $now)
                                ->where('tanggal_mulai', '<=', $now->copy()->addHours(24))
                                ->get();

        foreach ($reservations as $reservation) {
            if ($reservation->user) {
                \Log::info("Pengingat dikirim ke: " . $reservation->user->email . " untuk reservasi #" . $reservasi->id);
                 //Kode Email Asli
                 // Mail::to($reservasi->user->email)->send(new ReminderEmail($reservation));
            } else {
                \Log::warning("Tidak dapat mengirim email pengingat untuk reservasi #" . $reservasi->id . ". Pengguna tidak ditemukan.");
                //Opsi: Kirim pengingat melalui jalur lain, seperti SMS atau pemberitahuan dalam aplikasi
            }
        }
    }
}
