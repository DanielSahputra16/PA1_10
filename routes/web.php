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
Route::put('admin/Menu/{menu}', [MenuController::class, 'update'])->name('admin.Menu.update');
Route::get('/Aboutpublic', [AboutController::class, 'indexPublic'])->name('About.index');
Route::get('/booking', [BookingController::class, 'Booking'])->name('Booking');
Route::get('/galeripublic', [GaleriController::class, 'indexPublic'])->name('galeri.index');
Route::get('/menupublic', [MenuController::class, 'indexPublic'])->name('Menu.index');
Route::get('/testimonialspublic', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');

// Contact Routes (Frontend - Jika Diperlukan)
Route::get('/Contactpublic', [ContactController::class, 'indexPublic'])->name('Contact.index'); // Frontend

// Reservasi Routes
Route::resource('reservasi', ReservasiController::class);

// Grouped Routes with Middleware
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('manageUsers');
    Route::get('/bookings', [AdminController::class, 'manageBookings'])->name('manageBookings');

    Route::resource('testimonials', TestimonialController::class)->names('testimonials');
    Route::resource('contact', ContactController::class)->names('contact');
    Route::resource('About', AboutController::class)->names('About');
    Route::resource('galeri', GaleriController::class)->names('galeri'); // Galeri di dalam admin
});
