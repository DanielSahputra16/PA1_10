<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Reservasi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //Import DB Facade

class ReservasiController extends Controller
{
    public function indexPublic()
    {
        // Jika bukan admin, tampilkan hanya reservasi milik user yang login
        if (!auth()->user()->isAdmin()) {
            $reservasis = Reservasi::with(['lapangan', 'user'])
                ->where('user_id', auth()->id())
                ->get();
        } else {
            $reservasis = Reservasi::with(['lapangan', 'user'])->get();
        }

        return view('reservasi.index', compact('reservasis'));
    }

    public function index()
    {
        $reservasis = Reservasi::with(['lapangan', 'user'])->get(); //withTrashed()->get(); jika mau menampilkan yang softdeleted juga
        return view('admin.reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat reservasi
        $lapangans = Lapangan::all();
        return view('reservasi.create', compact('lapangans'));
    }

    public function edit($id) // Pastikan nama parameternya sesuai dengan route
    {
        try {
            // Ambil data reservasi berdasarkan ID
            $reservasi = Reservasi::findOrFail($id);

            // Ambil data lapangan yang diperlukan untuk form edit (misalnya, daftar pilihan lapangan)
            $lapangans = Lapangan::all();

            // Tampilkan view edit dan kirim data reservasi dan lapangan
            return view('reservasi.edit', compact('reservasi', 'lapangans'));

        } catch (ModelNotFoundException $e) {
            // Reservasi tidak ditemukan
            return redirect()->route('reservasi.index')->with('error', 'Reservasi tidak ditemukan.');
        }
    }

    public function show($id)
    {
        $reservasi = Reservasi::with(['lapangan', 'user'])->findOrFail($id);
        return view('reservasi.show', compact('reservasi'));
    }

    public function showAdmin($id) //Nama method diubah
    {
        $reservasi = Reservasi::with(['lapangan', 'user'])->findOrFail($id);
        return view('admin.reservasi.show', compact('reservasi'));
    }

    public function store(Request $request)
    {
        return $this->saveReservasi($request, null); // null berarti ini adalah operasi create
    }

    public function update(Request $request, Reservasi $reservasi)
    {
       return $this->saveReservasi($request, $reservasi); // Menyediakan reservasi berarti ini adalah update
    }

    private function saveReservasi(Request $request, Reservasi $reservasi = null)
    {
        // Validasi input
        $currentYear = now()->year;

        $validator = Validator::make($request->all(), [
            'lapangan_id' => 'required|exists:lapangans,id',
            'tanggal_mulai' => [
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
            'jam_mulai' => 'required',
            'tanggal_selesai' => 'required|date|same:tanggal_mulai',  // Tambahkan validasi 'same'
            'jam_selesai' => 'required',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:13',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Gabungkan tanggal dan jam
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai . ' ' . $request->jam_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai . ' ' . $request->jam_selesai);

        // Cek ketersediaan
        $lapangan_id = $request->lapangan_id;

        $overlappingReservations = Reservasi::where('lapangan_id', $lapangan_id)
            ->where(function ($query) use ($tanggal_mulai, $tanggal_selesai) {
                $query->whereBetween('tanggal_mulai', [$tanggal_mulai, $tanggal_selesai])
                    ->orWhereBetween('tanggal_selesai', [$tanggal_mulai, $tanggal_selesai])
                    ->orWhere(function ($q) use ($tanggal_mulai, $tanggal_selesai) {
                        $q->where('tanggal_mulai', '<=', $tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $tanggal_selesai);
                    });
            });

         // Jika ini adalah operasi update, exclude reservasi yang sedang di-update
        if ($reservasi) {
            $overlappingReservations->where('id', '!=', $reservasi->id);
        }

       $overlappingReservationsCount = $overlappingReservations->count();

        if ($overlappingReservationsCount > 0) {
            return back()->withErrors(['message' => 'Jadwal telah dipesan pada jam berikut.']);
        }

        // Jika reservasi null, buat instance baru, jika tidak, gunakan yang sudah ada
        if (!$reservasi) {
             $reservasi = new Reservasi();
             $reservasi->user_id = auth()->user()->id; // Dapatkan ID pengguna yang login (hanya pada saat create)
        }


        $reservasi->lapangan_id = $request->lapangan_id;
        $reservasi->tanggal_mulai = $tanggal_mulai;
        $reservasi->tanggal_selesai = $tanggal_selesai;
        $reservasi->nama = $request->nama;
        $reservasi->no_hp = $request->no_hp;
        $reservasi->save();

        // Eager Load User setelah disimpan agar relasi tersedia untuk pengiriman email
        $reservasi = Reservasi::with('user')->find($reservasi->id);

        // Kirim email konfirmasi (hanya jika ini adalah operasi create)
        if (!$reservasi) {
            $this->sendConfirmationEmail($reservasi);
        }else {
             $this->sendUpdateConfirmationEmail($reservasi);
        }


        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ' . ($reservasi ? 'diperbarui' : 'dibuat') . '!');

    }

    public function updateStatus(Request $request, Reservasi $reservasi)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,cancelled,completed', // Sesuaikan dengan nilai enum di migration
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(); // Kembali dengan error jika validasi gagal
        }

        // Update status reservasi
        $reservasi->status = $request->status;
        $reservasi->save();

        // Redirect atau kembalikan response sesuai kebutuhan
        return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
    }


    public function destroy(Reservasi $reservasi)
    {
        // Otorisasi: Pastikan user yang login adalah pemilik reservasi atau admin
        if (auth()->user()->id !== $reservasi->user_id && !auth()->user()->isAdmin()) {
            abort(403, 'Anda tidak diizinkan membatalkan reservasi ini.'); // Atau redirect dengan pesan error
        }

        // Gunakan DB::transaction untuk memastikan operasi atomik
        DB::transaction(function () use ($reservasi) {
            // Kirim email pembatalan SEBELUM dihapus
            $this->sendCancellationEmail($reservasi);

            //Soft Delete data reservasi
            $reservasi->delete();
        });

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!');
    }

    public function destroyAdmin(Reservasi $reservasi)
    {
        // Gunakan DB::transaction untuk memastikan operasi atomik
        DB::transaction(function () use ($reservasi) {
            // Kirim email pembatalan SEBELUM dihapus
            $this->sendCancellationEmail($reservasi);

            //Soft Delete data reservasi
            $reservasi->delete();
        });

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dibatalkan!');
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
                \Log::info("Pengingat dikirim ke: " . $reservasi->user->email . " untuk reservasi #" . $reservasi->id);
                 //Kode Email Asli
                 // Mail::to($reservasi->user->email)->send(new ReminderEmail($reservation));
            } else {
                \Log::warning("Tidak dapat mengirim email pengingat untuk reservasi #" . $reservasi->id . ". Pengguna tidak ditemukan.");
                //Opsi: Kirim pengingat melalui jalur lain, seperti SMS atau pemberitahuan dalam aplikasi
            }
        }
    }
}
