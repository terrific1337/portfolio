@extends('layouts.app')

@section('content')
    @include('layouts.partials.header')
    <p class="section-subtitle">A brief overview of my background and interests.</p>
    
    <div class="aboutme-container">
        @foreach($aboutmes as $aboutme)
            <h1>{{ $aboutme->name }}</h1>
            <div class="aboutme-item">
                <img src="{{ asset($aboutme->image) }}" alt="{{ Str::slug($aboutme->name) }}">
                <p>{!! nl2br(e($aboutme->text)) !!}</p>
            </div>
        @endforeach

        <div class="aboutme-item aboutme-links">
            <h2>Let's Connect</h2>
            <p>📧 Email: <a href="mailto:AnilcZorlu@gmail.com">AnilcZorlu@gmail.com</a></p>
            <p>🔗 <a href="https://www.linkedin.com/in/anilcanzorlu/" target="_blank">LinkedIn</a></p>
            <p>💻 <a href="https://github.com/terrific1337?tab=repositories" target="_blank">GitHub</a></p>
        </div>
    </div>
@endsection
