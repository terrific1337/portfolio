@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Edit Category</h1>

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

    <form action="{{ route('dashboard.skills.updateCategory', $category->id) }}" method="POST" class="dashboard-form">
        @csrf
        @method('PUT')

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Category Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach Existing Skills:</label>
            <div class="dashboard-checkbox-group">
                @foreach($skills as $skill)
                    <label class="dashboard-checkbox-item">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}"
                            {{ $category->skill->contains($skill->id) ? 'checked' : '' }}>
                        {{ $skill->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="dashboard-save-button">Update Category</button>
    </form>
@endsection
