<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::latest()->get();

        return view('dashboard',compact('messages'));
    }
    // Simpan Pesan ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string',
            'message' => 'required|string',
            
        ]);

        $message = Message::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Message saved successfully!',
            'data' => $message,
        ]);
    } 

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Responded,Rejected',
        ]);
    
        $message = Message::findOrFail($id);
        $message->status = $request->input('status');
        $message->save();
    
        return redirect()->route('dashboard')->with('success', 'Status updated successfully!');
    }
}
