<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\InformasiLapanganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/Aboutpublic', [AboutController::class, 'indexPublic'])->name('About.index'); // Perbaikan di sini!
Route::get('/booking', [BookingController::class, 'Booking'])->name('Booking');
Route::get('/galeripublic', [GaleriController::class, 'indexPublic'])->name('galeri.index');
Route::get('/menu', [MenuController::class, 'Menu'])->name('Menu');
Route::get('/testimonialspublic', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');

// Contact Routes (Frontend - Jika Diperlukan)
Route::get('/Contactpublic', [ContactController::class, 'indexPublic'])->name('Contact.index'); // Frontend

// Reservasi Routes
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
Route::get('/reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/reservasi/{reservasi}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
Route::put('/reservasi/{reservasi}', [ReservasiController::class, 'update'])->name('reservasi.update');
Route::delete('/reservasi/{reservasi}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

// Galeri Routes for Admin
Route::resource('admin/galeri', GaleriController::class)->names([
    'index' => 'admin.galeri.index',
    'create' => 'admin.galeri.create',
    'store' => 'admin.galeri.store',
    'show' => 'admin.galeri.show',
    'edit' => 'admin.galeri.edit',
    'update' => 'admin.galeri.update',
    'destroy' => 'admin.galeri.destroy',
]);

// Testimonial Routes
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

// Grouped Routes with Middleware
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/profile', [ProfileController::class, 'index']);

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () { // Tambahkan prefix 'admin'
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
        Route::get('/bookings', [AdminController::class, 'manageBookings'])->name('admin.manageBookings');

        Route::resource('testimonials', TestimonialController::class)->names([ // Testimonials di dalam admin
            'index' => 'admin.testimonials.index',
            'create' => 'admin.testimonials.create',
            'store' => 'admin.testimonials.store',
            'show' => 'admin.testimonials.show',
            'edit' => 'admin.testimonials.edit',
            'update' => 'admin.testimonials.update',
            'destroy' => 'admin.testimonials.destroy',
        ]);

        Route::resource('contact', ContactController::class)->names([
            'index' => 'admin.contact.index',
            'create' => 'admin.contact.create',
            'store' => 'admin.contact.store',
            'show' => 'admin.contact.show',
            'edit' => 'admin.contact.edit',
            'update' => 'admin.contact.update',
            'destroy' => 'admin.contact.destroy',
        ]);

        // Rute CRUD About untuk Admin
        Route::resource('admin/About', AboutController::class)->names([
            'index' => 'admin.About.index',
            'create' => 'admin.About.create',
            'store' => 'admin.About.store',
            'show' => 'admin.About.show',
            'edit' => 'admin.About.edit',
            'update' => 'admin.About.update',
            'destroy' => 'admin.About.destroy',
        ]);
    });
});
