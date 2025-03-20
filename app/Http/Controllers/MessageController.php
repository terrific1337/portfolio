<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MessageReplyMail;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || Auth::user()->level !== 5) {
            abort(403, 'Unauthorized');
        }
    }
    
    public function index(Request $request)
    {
        $showArchived = $request->query('archived', false);
    
        $messages = Message::when(!$showArchived, function ($query) {
            $query->where('status', '!=', 'archived');
        })->orderBy('created_at', 'desc')->get();
    
        return view('dashboard.messages.index', [
            'messages' => $messages,
            'showArchived' => $showArchived,
            'pageTitle' => $showArchived ? 'Archived Messages' : 'Messages',
        ]);
    }
    

    public function show(Message $message)
    {
        // Automatically mark message as "read" when opened
        if ($message->status === 'new') {
            $message->status = 'read';
            $message->save();
        }

        return view('dashboard.messages.show', [
            'message' => $message,
            'pageTitle' => 'Message from ' . $message->name
        ]);
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'reply_message' => 'required|string|min:5',
        ]);

        // Send the reply email
        Mail::to($message->email)
        ->bcc('AnilcZorlu@gmail.com') // So it shows up in your Gmail inbox
        ->send(new MessageReplyMail($message, $request->reply_message));

        // Update message status
        $message->reply_sent = true;
        $message->replied_at = now();
        $message->status = 'read'; // Keep status updated if needed
        $message->save();

        return redirect()->route('dashboard.messages.show', $message->id)
            ->with('success', 'Reply sent successfully.');
    }

    public function archive(Message $message)
    {
        $message->status = 'archived';
        $message->save();

        return redirect()->route('dashboard.messages.show', $message->id)
            ->with('success', 'Message archived successfully.');
    }

    public function markAsUnread(Message $message)
    {
        $message->status = 'new';
        $message->save();

        return redirect()->route('dashboard.messages')->with('success', 'Message marked as unread.');
    }

}
