<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string', 
            'message' => 'required|string',
        ]);

        // Kirim data ke API
        $response = Http::post('http://127.0.0.1:8080/api/messages', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Periksa apakah permintaan berhasil
        if ($response->successful()) {
            return redirect()->route('welcome')->with('success', 'Your message has been sent successfully!');
        }

        return redirect()->route('welcome')->with('error', 'There was an error sending your message.');
    }
}
