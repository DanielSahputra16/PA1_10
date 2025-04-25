<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Pastikan kamu punya view di resources/views/admin/dashboard.blade.php
    }

    public function manageUsers()
    {
        // Contoh: ambil data user
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }

    public function manageBookings()
    {
        // Contoh: ambil data booking
        $Reservasis = \App\Models\Reservasi::all();
        return view('admin.Reservasi.index', compact('Reservasis'));
    }
}
