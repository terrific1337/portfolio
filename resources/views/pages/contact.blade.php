@extends('layouts.app')

@section('content')
<div class="contact-container">
    <h1 class="contact-me-text">Contact Me</h1>

    <div class="contact-info">
        <p>📞 Telefoon: +31 6 14 37 61 24</p>
        <p>📧 Email: AnilcZorlu@gmail.com</p>
        <p>🔗 <a href="https://www.linkedin.com/in/anilcanzorlu/" target="_blank">LinkedIn</a></p>
    </div>

    <div class="contact-form">
        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                @error('name') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email')}}" required>
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="input-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required>
                @error('subject') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div class="input-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="4" required>{{ old('message') }}</textarea>
                @error('message') <p class="error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="contact-button">
                Send Message
            </button>
        </form>
    </div>
</div>
@endsection
