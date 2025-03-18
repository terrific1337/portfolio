@extends('dashboard.master')

@section('dashboard_section')

    <h1 class="dashboard-heading">Edit Job</h1>

    <a href="{{ route('dashboard.jobs') }}" class="dashboard-back-button">← Back to About Me List</a>
    
    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.aboutme.update', $aboutme->id) }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Section Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $aboutme->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="text" class="dashboard-form-label">Description:</label>
            <textarea id="text" name="text" class="dashboard-form-input">{{ old('text', $aboutme->text) }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="image" class="dashboard-form-label">Section Image (Upload new if replacing):</label>
            <input type="file" id="image" name="image" class="dashboard-form-input" accept="image/*">
            @if ($aboutme->image)
                <p class="dashboard-description">Current: <a href="{{ asset('storage/' . $aboutme->image) }}" target="_blank">{{ $aboutme->image }}</a></p>
            @endif
        </div>

        <button type="submit" class="dashboard-save-button">Update About Me</button>
    </form>
@endsection