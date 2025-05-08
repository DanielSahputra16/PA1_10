<?php

namespace App\Http\Controllers;

use App\Models\Testimonial; // Import model Testimonial
use Illuminate\Http\Request;

class HomeController extends Controller // Atau nama controller Anda
{
    public function index()
    {
        // Ambil 3 testimoni terbaru, tanpa mempedulikan status apa pun
        $testimonials = Testimonial::orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();

        return view('welcome', compact('testimonials'));
    }
}
