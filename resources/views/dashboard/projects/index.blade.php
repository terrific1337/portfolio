@extends('dashboard.master')

@section('dashboard_section')
    <h1>Manage Projects</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Project button --}}
    <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">+ Add New Project</a>

    {{-- Project list --}}
    <ul>
        @foreach($projects as $project)
            <li>
                <strong>{{ $project->name }}</strong><br>
                {{ $project->description }}
            </li>
        @endforeach
    </ul>
@endsection
