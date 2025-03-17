@extends('layouts.app')
@section('content')
@include('layouts.partials.header')

<p class="section-subtitle">Here are some of the skills I've acquired and honed over time.</p>

<div class="skills-container">
    @foreach($categories as $category)
        <div class="skills-section">
            <h1>{{ $category->name }}</h1>
            <div class="skills-grid">
                @foreach($category->skill as $skill)
                    <div>
                        <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}">
                        <p>{{ $skill->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
