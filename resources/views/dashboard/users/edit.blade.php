@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Edit User</h1>

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

    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST" class="dashboard-form">
        @csrf
        @method('PUT')

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="email" class="dashboard-form-label">Email:</label>
            <input type="email" id="email" name="email" class="dashboard-form-input" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="level" class="dashboard-form-label">Level (0-5):</label>
            <input type="number" id="level" name="level" min="0" max="5" class="dashboard-form-input" value="{{ old('level', $user->level) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="password" class="dashboard-form-label">New Password (leave blank to keep current):</label>
            <input type="password" id="password" name="password" class="dashboard-form-input">
        </div>

        <div class="dashboard-form-group">
            <label for="password_confirmation" class="dashboard-form-label">Confirm New Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="dashboard-form-input">
        </div>

        <button type="submit" class="dashboard-save-button">Update User</button>
    </form>
@endsection
