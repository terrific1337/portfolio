@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-title">Welcome to your Dashboard</h1>

    <p class="dashboard-greeting">Hello, {{ Auth::user()->name }}!</p>

    <div class="dashboard-stats">
        <div>Total Projects: {{ $totalProjects }}</div>
        <div>Featured Projects: {{ $featuredProjects }}</div>
        <div>Total Jobs: {{ $totalJobs }}</div>
        <div>Total Users: {{ $totalUsers }}</div>
        <div>Total Skills: {{ $totalSkills }}</div>
        <div>Total Contact Submissions: {{ $totalMessages }}</div>
    </div>

    <div class="latest-entries">
        <h2>Latest Registered Users</h2>
        <ul>
            @foreach($latestUsers as $user)
                <li>{{ $user->name }} ({{ $user->email }}) - Registered on {{ $user->created_at->format('d-m-Y') }}</li>
            @endforeach
        </ul>

        <h2>Latest Contact Submissions</h2>
        <ul>
            @foreach($latestMessages as $message)
                <li>{{ $message->name }} - {{ $message->subject }} ({{ $message->created_at->format('d-m-Y') }})</li>
            @endforeach
        </ul>
    </div>

    <div class="quick-actions">
        <h2>Quick Actions</h2>
        <ul>
            <li><a href="{{ route('dashboard.projects') }}">Manage Projects</a></li>
            <li><a href="{{ route('dashboard.jobs') }}">Manage Jobs</a></li>
            <li><a href="{{ route('dashboard.skills') }}">Manage Skills</a></li>
            <li><a href="{{ route('dashboard.users') }}">Manage Users</a></li>
            <li><a href="{{ route('dashboard.messages') }}">View Messages</a></li>
        </ul>
    </div>
@endsection
