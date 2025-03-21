@extends('layouts.app')

@section('content')
@include('layouts.partials.header')

<p class="section-subtitle">Don't just believe my word, here are others.</p>

<div class="testimonial-container">
    <h1 class="testimonial-title">{{ $pageTitle }}</h1>

    <div class="testimonial-grid">
        @foreach($testimonials as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-photo">
                    <img src="{{ asset($testimonial->photo) }}" alt="{{ $testimonial->name }}">
                </div>
                <div class="testimonial-content">
                    <h2 class="testimonial-name">{{ $testimonial->name }}</h2>
                    <p class="testimonial-title-text">{{ $testimonial->title }}</p>
                    <p class="testimonial-text">"{{ $testimonial->content }}"</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
