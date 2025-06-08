<?php

namespace App\Http\Controllers;

// Import model dan class yang dibutuhkan
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Tampilkan halaman register
    }

    /**
     * Menangani proses registrasi user baru.
     */
    public function register(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'], // Nama wajib diisi, maksimal 255 karakter
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Email wajib, harus unik di tabel users
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Password minimal 8 karakter dan harus cocok dengan konfirmasi
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error dan data input sebelumnya
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan user ke database
        $user = User::create([
            'name' => $request->name, // Simpan nama
            'email' => $request->email, // Simpan email
            'password' => Hash::make($request->password), // Enkripsi password
            'is_admin' => false, // Secara default, user bukan admin
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman login setelah register sukses (bisa diubah ke dashboard jika mau)
        return redirect()->route('login');
    }

    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Tampilkan halaman login
    }

    /**
     * Menangani proses login.
     */
    public function login(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'], // Email wajib dan harus valid
            'password' => ['required'], // Password wajib
        ]);

        // Coba login dengan email dan password yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Cek apakah user adalah admin
            if (Auth::user()->is_admin) {
                return redirect()->intended(route('admin.dashboard')); // Jika admin, ke dashboard admin
            } else {
                return redirect()->intended(route('welcome')); // Jika bukan admin, ke halaman welcome
            }
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.', // Pesan error untuk login gagal
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout user

        // Invalidate session (hapus semua data session)
        $request->session()->invalidate();

        // Buat ulang token CSRF
        $request->session()->regenerateToken();

        // Kembali ke halaman utama
        return redirect('/');
    }
}
