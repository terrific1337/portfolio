@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-title">Welcome to your Dashboard</h1>

    <p class="dashboard-greeting">Hello, {{ Auth::user()->name }}!</p>

    <p class="dashboard-description">
        This is your personal dashboard area. You’re logged in and ready to go.
    </p>
@endsection
