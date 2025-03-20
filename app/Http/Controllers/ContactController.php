<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        Mail::to('AnilcZorlu@gmail.com')->send(new ContactMail($validated));

        Mail::to($validated['email'])->send(new ContactConfirmationMail($validated));

        return back()->with('success', 'Your message has been sent succesfully!');
    }
}
