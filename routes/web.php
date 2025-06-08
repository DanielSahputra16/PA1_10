<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\JadwalLapanganController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route halaman utama / home (public)
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Route public (bisa diakses tanpa login)
Route::get('/Aboutpublic', [AboutController::class, 'indexPublic'])->name('About.indexPublic');
Route::get('/galeripublic', [GaleriController::class, 'indexPublic'])->name('galeri.indexPublic');
Route::get('/testimonialspublic', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/jadwalpublic', [JadwalLapanganController::class, 'indexPublic'])->name('jadwal.indexPublic');
Route::get('/contact', [ContactController::class, 'indexPublic'])->name('contact.index');
Route::get('/Menupublic', [MenuController::class, 'indexPublic'])->name('menu.indexPublic');

// Routes untuk Authentication (Register, Login, Logout)
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group route yang memerlukan user sudah login (auth middleware)
Route::middleware('auth')->group(function () {
    // Testimonial create, store, show, delete untuk user yang sudah login
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('testimonials.show');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');
});

// Group route untuk admin (auth + admin middleware), prefix url admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    // Resource route untuk testimonials admin panel
    Route::resource('testimonials', App\Http\Controllers\TestimonialController::class, ['names' => 'admin.testimonials']);
});

// Group route reservasi, user harus login untuk akses fitur reservasi
Route::group(['middleware' => 'auth'], function () {
    Route::get('/reservasi', [ReservasiController::class, 'indexPublic'])->name('reservasi.index');
    Route::get('/reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{reservasi}', [ReservasiController::class, 'show'])->name('reservasi.show');
    Route::get('/reservasi/{reservasi}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::put('/reservasi/{reservasi}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('/reservasi/{reservasi}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');
});

// Group route untuk admin panel, prefix 'admin', hanya admin yang bisa akses
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    // Dashboard admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Kelola user
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');

    // Galeri routes manual (CRUD admin)
    Route::get('/Galeri', [GaleriController::class, 'index'])->name('admin.Galeri.index');
    Route::get('/Galeri/create', [GaleriController::class, 'create'])->name('admin.Galeri.create');
    Route::post('/Galeri', [GaleriController::class, 'store'])->name('admin.Galeri.store');
    Route::get('/Galeri/{galeri}', [GaleriController::class, 'show'])->name('admin.Galeri.show');
    Route::get('/Galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('admin.Galeri.edit');
    Route::put('/Galeri/{galeri}', [GaleriController::class, 'update'])->name('admin.Galeri.update');
    Route::delete('/Galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.Galeri.destroy');

    // About routes admin
    Route::get('/About', [AboutController::class, 'index'])->name('admin.About.index');
    Route::get('/About/create', [AboutController::class, 'create'])->name('admin.About.create');
    Route::post('/About', [AboutController::class, 'store'])->name('admin.About.store');
    Route::get('/About/{about}', [AboutController::class, 'show'])->name('admin.About.show');
    Route::get('/About/{about}/edit', [AboutController::class, 'edit'])->name('admin.About.edit');
    Route::put('/About/{about}', [AboutController::class, 'update'])->name('admin.About.update');
    Route::delete('/About/{about}', [AboutController::class, 'destroy'])->name('admin.About.destroy');

    // Menu routes admin
    Route::get('/Menu', [MenuController::class, 'index'])->name('admin.Menu.index');
    Route::get('/Menu/create', [MenuController::class, 'create'])->name('admin.Menu.create');
    Route::post('/Menu', [MenuController::class, 'store'])->name('admin.Menu.store');
    Route::get('/Menu/{menu}', [MenuController::class, 'show'])->name('admin.Menu.show');
    Route::get('/Menu/{menu}/edit', [MenuController::class, 'edit'])->name('admin.Menu.edit');
    Route::put('/admin/Menu/{menu}', [MenuController::class, 'update'])->name('admin.Menu.update');
    Route::delete('/admin/Menu/{menu}', [MenuController::class, 'destroy'])->name('admin.Menu.destroy');

    // Contact routes admin
    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('admin.contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('admin.contact.store');
    Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('admin.contact.edit');
    Route::put('/contact/{contact}', [ContactController::class, 'update'])->name('admin.contact.update');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    // Jadwal lapangan admin routes
    Route::get('/jadwal_lapangan', [JadwalLapanganController::class, 'index'])->name('admin.jadwal_lapangan.index');
    Route::get('/jadwal_lapangan/create', [JadwalLapanganController::class, 'create'])->name('admin.jadwal_lapangan.create');
    Route::post('/jadwal_lapangan', [JadwalLapanganController::class, 'store'])->name('admin.jadwal_lapangan.store');
    Route::get('/jadwal_lapangan/{jadwal_lapangan}', [JadwalLapanganController::class, 'show'])->name('admin.jadwal_lapangan.show');
    Route::get('/jadwal_lapangan/{jadwal_lapangan}/edit', [JadwalLapanganController::class, 'edit'])->name('admin.jadwal_lapangan.edit');
    Route::put('/jadwal_lapangan/{jadwal_lapangan}', [JadwalLapanganController::class, 'update'])->name('admin.jadwal_lapangan.update');
    Route::delete('/jadwal_lapangan/{jadwal_lapangan}', [JadwalLapanganController::class, 'destroy'])->name('admin.jadwal_lapangan.destroy');

    // Reservasi routes untuk admin (lihat, update status, hapus)
    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('admin.reservasi.index');
    Route::get('/reservasi/{reservasi}', [ReservasiController::class, 'showAdmin'])->name('admin.reservasi.show');
    Route::patch('/reservasi/{reservasi}/status', [ReservasiController::class, 'updateStatus'])->name('admin.reservasi.updateStatus');
    Route::delete('/reservasi/{reservasi}', [ReservasiController::class, 'destroyAdmin'])->name('admin.reservasi.destroy');

    // Testimonial admin routes (list, show detail, delete)
    Route::get('/testimonials', [TestimonialController::class, 'indexAdmin'])->name('admin.testimonials.index');
    Route::get('/testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroyAdmin'])->name('admin.testimonials.destroy');
});
