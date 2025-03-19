@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Project</h1>
    
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

    <form action="{{ route('dashboard.projects.store') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Project Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="description" class="dashboard-form-label">Description:</label>
            <textarea id="description" name="description" class="dashboard-form-input">{{ old('description') }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="screenshot" class="dashboard-form-label">Project Banner Image:</label>
            <input type="file" id="screenshot" name="screenshot" class="dashboard-form-input" accept="image/*">
        </div>

        <div class="dashboard-form-group">
            <label for="demo" class="dashboard-form-label">Demo Link:</label>
            <input type="text" id="demo" name="demo" class="dashboard-form-input">
        </div>

        <div class="dashboard-form-group">
            <label for="repo" class="dashboard-form-label">Repo Link:</label>
            <input type="text" id="repo" name="repo" class="dashboard-form-input">
        </div>

        <div class="dashboard-form-group">
            <label for="status" class="dashboard-form-label">Status:</label>
            <select name="status" id="status" class="dashboard-form-input" required>
                <option value="">-- Select Status --</option>
                <option value="completed" {{ old('status') === 'active' ? 'selected' : '' }}>Completed</option>
                <option value="in-progress" {{ old('status') === 'active' ? 'selected' : '' }}>In Progress</option>
                <option value="planned" {{ old('status') === 'active' ? 'selected' : '' }}>Planned</option>
            </select>
        </div>

        <div class="dashboard-form-group">
            <label for="category" class="dashboard-form-label">Category:</label>
            <select name="category" id="category" class="dashboard-form-input" required>
                <option value="" {{ old('category') === 'active' ? 'selected' : '' }}>-- Select Category --</option>
                <option value="school" {{ old('category') === 'active' ? 'selected' : '' }}>School</option>
                <option value="personal" {{ old('category') === 'active' ? 'selected' : '' }}>Personal</option>
                <option value="work" {{ old('category') === 'active' ? 'selected' : '' }}>Work</option>
            </select>
        </div>
        
        <button type="submit" class="dashboard-save-button">Save Project</button>
    </form>
@endsection
