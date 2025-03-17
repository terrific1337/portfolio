@extends('layouts.app')

@section('content')
    <div class="register-container">
        <h2 class="register-title">Register</h2>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" class="register-form">
            @csrf

            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required autofocus>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
@endsection
