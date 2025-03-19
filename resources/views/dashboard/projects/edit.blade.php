@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Edit Project</h1>

    <a href="{{ route('dashboard.projects') }}" class="dashboard-back-button">← Back to Projects</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Project Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $project->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="description" class="dashboard-form-label">Description:</label>
            <textarea name="description" id="description" class="dashboard-form-input">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="screenshot" class="dashboard-form-label">Project Banner Image (Upload new if replacing):</label>
            <input type="file" id="screenshot" name="screenshot" class="dashboard-form-input" accept="image/*">
            @if ($project->screenshot)
                <p class="dashboard-description">Current: <a href="{{ asset('storage/' . $project->screenshot) }}" target="_blank">{{ $project->screenshot }}</a></p>
                @endif
        </div>

        <div class="dashboard-form-group">
            <label for="status" class="dashboard-form-label">Status:</label>
            <select name="status" id="status" class="dashboard-form-input" required>
                <option value="completed" {{ old('status', $project->status == 'completed' ? 'selected' : '' )}}>Completed</option>
                <option value="in-progress" {{ old('status', $project->status == 'in-progress' ? 'selected' : '' )}}>In Progress</option>
                <option value="planned" {{ old('status', $project->status == 'planned' ? 'selected' : '' )}}>Planned</option>
            </select>
        </div>

        <div class="dashboard-form-group">
            <label for="category" class="dashboard-form-label">Category:</label>
            <select name="category" id="category" class="dashboard-form-input" required>
                <option value="school" {{ old('category', $project->category == 'school' ? 'selected' : '' )}}>School</option>
                <option value="personal" {{ old('category', $project->category == 'personal' ? 'selected' : '' )}}>Personal</option>
                <option value="work" {{ old('category', $project->category == 'work' ? 'selected' : '' )}}>Work</option>
            </select>
        </div>

        <div class="dashboard-form-group">
            <label for="repo" class="dashboard-form-label">Repository Link:</label>
            <input type="text" id="repo" name="repo" class="dashboard-form-input" value="{{ old('repo', $project->repo) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="demo" class="dashboard-form-label">Demo Link:</label>
            <input type="text" id="demo" name="demo" class="dashboard-form-input" value="{{ old('demo', $project->demo) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach Tags:</label>
            <div class="dashboard-checkbox-group">
                @foreach($tags as $tag)
                    <label class="dashboard-checkbox-item">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            {{ $project->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="dashboard-save-button">Update Project</button>
    </form>
@endsection