@extends('layouts.app')
@section('content')
@include('layouts.partials.header')

<p class="section-subtitle">Here are some of the skills I've acquired and honed over time.</p>

<div class="skills-container">
    @foreach($skills->groupBy(fn($skill) => optional($skill->category->first())->name ?? 'Other') as $category => $skillGroup)
        <div class="skills-section">
            <h1>{{ $category }}</h1>
            <div class="skills-grid">
                @foreach($skillGroup as $skill)
                    <div>
                        <img src="{{ asset('images/' . $skill->icon) }}" alt="{{ $skill->name }}">
                        <p>{{ $skill->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
