@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Tag</h1>

    <a href="{{ route('dashboard.projects') }}" class="dashboard-back-button">← Back to Projects Overview</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.projects.storeTag') }}" method="POST" class="dashboard-form">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Tag Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach Existing Project:</label>
            <div class="dashboard-checkbox-group">
                @foreach($projects as $project)
                    <label class="dashboard-checkbox-item">
                        <input type="checkbox" name="projects[]" value="{{ $project->id }}">
                        {{ $project->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="dashboard-save-button">Save Tag</button>
    </form>
@endsection