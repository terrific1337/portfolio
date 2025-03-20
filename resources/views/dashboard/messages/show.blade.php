@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Message from {{ $message->name }}</h1>
    @if(session('success'))
    <div class="success-msg">{{ session('success') }}</div>
@endif
    <a href="{{ route('dashboard.messages') }}" class="btn-back">← Back to message list</a>
    {{-- Archive Form --}}
@if($message->status !== 'archived')
<form method="POST" action="{{ route('dashboard.messages.archive', $message->id) }}" style="margin-top: 20px;">
    @csrf
    <button type="submit" class="btn-archive">Archive Message</button>
</form>
@endif
    <div class="message-detail-container">
        {{-- Message Info --}}
        <div class="message-meta">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Subject:</strong> {{ $message->subject }}</p>
            <p><strong>Sent at:</strong> {{ $message->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Status:</strong>
                <span class="status-badge status-{{ $message->status }}">
                    {{ ucfirst($message->status) }}
                </span>
            </p>
        </div>

        <hr>

        {{-- Message Content --}}
        <div class="message-body">
            <p><strong>Message content:</strong></p>
            <div class="message-content-box">
                <pre>{{ $message->message }}</pre>
            </div>
        </div>
    </div>

    {{-- Reply Form --}}
    <div class="reply-section">
        <h2 class="reply-title">Reply to {{ $message->name }}</h2>

        <form method="POST" action="{{ route('dashboard.messages.reply', $message->id) }}">
            @csrf

            <div class="form-group">
                <label for="reply_message">Your Reply:</label><br>
                <textarea name="reply_message" id="reply_message" rows="6" required class="reply-textarea" placeholder="Type your reply here..."></textarea>
            </div>

            <button type="submit" class="btn-reply">Send Reply</button>
        </form>
    </div>



@endsection

