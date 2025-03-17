@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New User</h1>

    <a href="{{ route('dashboard.users') }}" class="dashboard-back-button">← Back to User List</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.users.store') }}" method="POST" class="dashboard-form">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="email" class="dashboard-form-label">Email:</label>
            <input type="email" id="email" name="email" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="password" class="dashboard-form-label">Password:</label>
            <input type="password" id="password" name="password" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="password_confirmation" class="dashboard-form-label">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="level" class="dashboard-form-label">Level (0-5):</label>
            <input type="number" id="level" name="level" min="0" max="5" class="dashboard-form-input" value="{{ old('level', 0) }}">
        </div>

        <button type="submit" class="dashboard-save-button">Save User</button>
    </form>
@endsection
