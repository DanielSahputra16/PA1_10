<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactInfo::first(); // Ambil satu-satunya record (atau yang pertama)

        return view('contact.index', ['contact' => $contact]);
    }
}
