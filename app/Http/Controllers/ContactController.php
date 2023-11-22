<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
use Log;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('client.contact.form');
    }
    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Log the request data to make sure it's correct
        Log::info('Contact Form Data:', $request->all());

        try {
            // Send email
            Mail::to('quangln.htra.291103@gmail.com')->send(new ContactMail($request));
            // Rest of your code
            return redirect('/contact')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::error('Error sending email: ' . $e->getMessage());
            return redirect('/contact')->with('error', 'There was an error sending your message. Please try again later.');
        }
    }
}
