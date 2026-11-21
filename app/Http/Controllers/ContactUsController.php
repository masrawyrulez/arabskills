<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    function index(){
        return view('/'); 
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Extract validated data
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $phone = $validatedData['phone'] ?? null;
        $company = $validatedData['company'] ?? null;
        $userMessage = $validatedData['message']; // Rename to avoid conflict
    
        // Send the email
        Mail::send('mail.contact', compact('name', 'email', 'phone', 'company', 'userMessage'), function ($mailMessage) use ($email) {
            $mailMessage->to('zeinabyismail44@gmail.com');
            $mailMessage->subject('Arabskills Academy');
        });
    
        return back()->with('success', 'Thanks for contacting us!');
    }}
