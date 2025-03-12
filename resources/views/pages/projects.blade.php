@extends('layouts.app')

@section('content')
@include('layouts.partials.header')

<p class="section-subtitle">Here are some of the projects I've worked on to apply and improve my skills.</p>

<div class="projects-grid">

    @if($projects->count())
        @foreach($projects as $project)
            <div class="project-card">
                <div class="project-meta">
                    <span class="project-category {{ $project->category }}">{{ $project->category }}</span>
                    <span class="project-status {{ $project->status }}">{{ $project->status }}</span>
                </div>

                <img src="{{ asset($project->screenshot) }}" alt="Project Screenshot" class="project-thumb">
                <h2>{{ $project->name }}</h2>
                <p>{{ $project->description }}</p>

                <div class="project-tags">
                    @foreach($project->tags as $tag)
                        <span>{{ $tag->name }}</span>
                    @endforeach
                </div>

                <div class="project-links">
                    <a href="{{ $project->demo }}" class="btn" target="_blank">Live Demo</a>
                    <a href="{{ $project->repo }}" class="btn" target="_blank">View Code</a>
                </div>
            </div>
        @endforeach
    @else
        <p class="no-jobs">No projects available.</p>
    @endif

</div>

@endsection
