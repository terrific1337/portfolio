@extends('layouts.app')

@section('content')
@include('layouts.partials.header')

<p class="section-subtitle">Here are some of the projects I've worked on to apply and improve my skills.</p>

<div class="projects-grid">

    {{-- Example Project Card --}}
    <div class="project-card">
        <div class="project-meta">
            <span class="project-category personal">Personal</span>
            <span class="project-status completed">Completed</span>
        </div>

        <img src="{{ asset('images/project-placeholder.png') }}" alt="Project Screenshot" class="project-thumb">
        <h2>Static Project Name</h2>
        <p>This is a static project description. It gives a quick overview of what the project is about and what it accomplishes.</p>

        <div class="project-tags">
            <span>Laravel</span>
            <span>Vue.js</span>
            <span>MySQL</span>
        </div>

        <div class="project-links">
            <a href="#" class="btn">Live Demo</a>
            <a href="#" class="btn">View Code</a>
        </div>
    </div>

    <div class="project-card">
        <div class="project-meta">
            <span class="project-category school">School</span>
            <span class="project-status in-progress">In Progress</span>
        </div>

        <img src="{{ asset('images/project-placeholder.png') }}" alt="Project Screenshot" class="project-thumb">
        <h2>Another Static Project</h2>
        <p>This is another example project with a different description. You can test how varying text lengths affect the design.</p>

        <div class="project-tags">
            <span>PHP</span>
            <span>TailwindCSS</span>
        </div>

        <div class="project-links">
            <a href="#" class="btn">Live Demo</a>
            <a href="#" class="btn">View Code</a>
        </div>
    </div>

    <div class="project-card">
        <div class="project-meta">
            <span class="project-category work">Work</span>
            <span class="project-status planned">Planned</span>
        </div>

        <img src="{{ asset('images/project-placeholder.png') }}" alt="Project Screenshot" class="project-thumb">
        <h2>Work Project Showcase</h2>
        <p>Showcase a real-world freelance or school project. You can emphasize its goals, stack, and outcomes.</p>

        <div class="project-tags">
            <span>Bootstrap</span>
            <span>Laravel</span>
            <span>Git</span>
        </div>

        <div class="project-links">
            <a href="#" class="btn">Live Demo</a>
            <a href="#" class="btn">View Code</a>
        </div>
    </div>

</div>

@endsection
