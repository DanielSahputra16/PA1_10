<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;

// Public Routes (Frontend)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/Aboutpublic', [AboutController::class, 'indexPublic'])->name('About.indexPublic');
Route::get('/galeripublic', [GaleriController::class, 'indexPublic'])->name('galeri.indexPublic');
Route::get('/testimonialspublic', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/jadwalpublic', [JadwalController::class, 'indexPublic'])->name('jadwal.indexPublic');
Route::get('/Contactpublic', [ContactController::class, 'indexPublic'])->name('Contact.indexPublic');
Route::get('/Menupublic', [MenuController::class, 'indexPublic'])->name('menu.indexPublic');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Resource route untuk frontend testimonials
Route::resource('testimonials', TestimonialController::class)->only(['create', 'store', 'destroy']);

// Reservasi Routes
Route::resource('reservasi', ReservasiController::class);

// Admin Routes (Grouped with Middleware)
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/bookings', [AdminController::class, 'manageBookings'])->name('admin.manageBookings');

    // Galeri Routes (Manual)
    Route::get('/Galeri', [GaleriController::class, 'index'])->name('admin.Galeri.index');
    Route::get('/Galeri/create', [GaleriController::class, 'create'])->name('admin.Galeri.create');
    Route::post('/Galeri', [GaleriController::class, 'store'])->name('admin.Galeri.store');
    Route::get('/Galeri/{galeri}', [GaleriController::class, 'show'])->name('admin.Galeri.show');
    Route::get('/Galeri/{galeri}/edit', [GaleriController::class, 'edit'])->name('admin.Galeri.edit');
    Route::put('/Galeri/{galeri}', [GaleriController::class, 'update'])->name('admin.Galeri.update');
    Route::delete('/Galeri/{galeri}', [GaleriController::class, 'destroy'])->name('admin.Galeri.destroy');

    Route::get('/About', [AboutController::class, 'index'])->name('admin.About.index');
    Route::get('/About/create', [AboutController::class, 'create'])->name('admin.About.create');
    Route::post('/About', [AboutController::class, 'store'])->name('admin.About.store');
    Route::get('/About/{About}', [AboutController::class, 'show'])->name('admin.About.show');
    Route::get('/About/{About}/edit', [AboutController::class, 'edit'])->name('admin.About.edit');
    Route::put('/About/{About}', [AboutController::class, 'update'])->name('admin.About.update');
    Route::delete('/About/{About}', [AboutController::class, 'destroy'])->name('admin.About.destroy');

    Route::get('/Menu', [MenuController::class, 'index'])->name('admin.Menu.index');
    Route::get('/Menu/create', [MenuController::class, 'create'])->name('admin.Menu.create');
    Route::post('/Menu', [MenuController::class, 'store'])->name('admin.Menu.store');
    Route::get('/Menu/{menu}', [MenuController::class, 'show'])->name('admin.Menu.show');
    Route::get('/Menu/{menu}/edit', [MenuController::class, 'edit'])->name('admin.Menu.edit');
    Route::put('/admin/Menu/{menu}', [MenuController::class, 'update'])->name('admin.Menu.update');
    Route::delete('/Menu/{Menu}', [MenuController::class, 'destroy'])->name('admin.Menu.destroy');

    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/testimonials/{testimonial}', [TestimonialController::class, 'show'])->name('admin.testimonials.show');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('admin.contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('admin.contact.store');
    Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('admin.contact.edit');
    Route::put('/contact/{contact}', [ContactController::class, 'update'])->name('admin.contact.update');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    Route::get('/jadwals', [JadwalController::class, 'index'])->name('admin.jadwals.index');
    Route::get('/jadwals/create', [JadwalController::class, 'create'])->name('admin.jadwals.create');
    Route::post('/jadwals', [JadwalController::class, 'store'])->name('admin.jadwals.store');
    Route::get('/jadwals/{jadwal}', [JadwalController::class, 'show'])->name('admin.jadwals.show');
    Route::get('/jadwals/{jadwal}/edit', [JadwalController::class, 'edit'])->name('admin.jadwals.edit');
    Route::put('/jadwals/{jadwal}', [JadwalController::class, 'update'])->name('admin.jadwals.update');
    Route::delete('/jadwals/{jadwal}', [JadwalController::class, 'destroy'])->name('admin.jadwals.destroy');
});
