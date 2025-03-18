@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Edit Skill</h1>

    <a href="{{ route('dashboard.skills') }}" class="dashboard-back-button">← Back to Skills Overview</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.skills.update', $skill->id) }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Skill Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input"
                   value="{{ old('name', $skill->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="icon" class="dashboard-form-label">Skill Icon (Upload new if replacing):</label>
            <input type="file" id="icon" name="icon" class="dashboard-form-input" accept="image/*">
            @if ($skill->icon)
                <p class="dashboard-description">Current: <a href="{{ asset('storage/' . $skill->icon) }}" target="_blank">{{ $skill->icon }}</a></p>
            @endif
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach Categories:</label>
            <div class="dashboard-checkbox-group">
                @foreach($categories as $category)
                    <label class="dashboard-checkbox-item">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                            {{ $skill->category->contains($category->id) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="dashboard-save-button">Update Skill</button>
    </form>
@endsection
