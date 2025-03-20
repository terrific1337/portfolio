@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-title">Welcome to your Dashboard</h1>
    <p class="dashboard-greeting">Hello, {{ Auth::user()->name }}!</p>

    {{-- STAT CARDS --}}
    <div class="dashboard-flex-grid" style="margin-bottom: 40px;">
        <div class="dashboard-half dashboard-section-card">
            <h2 class="dashboard-heading">Statistics</h2>
            <div class="dashboard-flex-grid">

                <div class="stats-card">
                    <h3><span class="badge">📁</span> Total Projects</h3>
                    <p>{{ $totalProjects }}</p>
                </div>

                <div class="stats-card">
                    <h3><span class="badge">⭐</span> Featured Projects</h3>
                    <p>{{ $featuredProjects }}</p>
                </div>

                <div class="stats-card">
                    <h3><span class="badge">💼</span> Total Jobs</h3>
                    <p>{{ $totalJobs }}</p>
                </div>

                <div class="stats-card">
                    <h3><span class="badge">👤</span> Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>

                <div class="stats-card">
                    <h3><span class="badge">🛠️</span> Total Skills</h3>
                    <p>{{ $totalSkills }}</p>
                </div>

                <div class="stats-card">
                    <h3><span class="badge">✉️</span> Contact Submissions</h3>
                    <p>{{ $totalMessages }}</p>
                </div>

            </div>
        </div>

        {{-- QUICK ACTIONS --}}
        <div class="dashboard-half dashboard-section-card">
            <h2 class="dashboard-heading">Quick Actions</h2>
            <div class="dashboard-flex-grid">
                <a class="dashboard-add-button" href="{{ route('dashboard.projects') }}">📁 Manage Projects</a>
                <a class="dashboard-add-button" href="{{ route('dashboard.jobs') }}">💼 Manage Jobs</a>
                <a class="dashboard-add-button" href="{{ route('dashboard.skills') }}">🛠️ Manage Skills</a>
                <a class="dashboard-add-button" href="{{ route('dashboard.users') }}">👤 Manage Users</a>
                <a class="dashboard-add-button" href="{{ route('dashboard.messages') }}">✉️ View Messages</a>
            </div>
        </div>
    </div>

    {{-- LATEST ENTRIES --}}
    <div class="dashboard-flex-grid">
        {{-- LATEST REGISTERED USERS --}}
        <div class="dashboard-half dashboard-section-card">
            <h2 class="dashboard-heading">Latest Registered Users</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestUsers as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No recent users.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- LATEST CONTACT SUBMISSIONS --}}
        <div class="dashboard-half dashboard-section-card">
            <h2 class="dashboard-heading">Latest Contact Submissions</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestMessages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No recent messages.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
