@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Messages</h1>

 {{-- Filter Toggle --}}
 <div class="message-filters" style="margin-bottom: 20px;">
    @if($showArchived)
        <a href="{{ route('dashboard.messages') }}" class="btn-filter">← Back to Active Messages</a>
    @else
        <a href="{{ route('dashboard.messages', ['archived' => true]) }}" class="btn-filter">Show Archived Messages</a>
    @endif
</div>

{{-- Message Table --}}
<table class="dashboard-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Received</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($messages as $message)
            <tr class="{{ $message->status === 'archived' ? 'archived-row' : '' }}">
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->subject }}</td>
                <td>
                    <span class="status-badge status-{{ $message->status }}">
                        {{ ucfirst($message->status) }}
                    </span>
                </td>
                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('dashboard.messages.show', $message->id) }}" class="btn-view">View</a>
                
                    @if($message->status !== 'new')
                        <form method="POST" action="{{ route('dashboard.messages.markAsUnread', $message->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-unread">Mark Unread</button>
                        </form>
                    @endif
                </td>                
            </tr>
        @empty
            <tr>
                <td colspan="6">No messages found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
