@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Skill</h1>

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

    <form action="{{ route('dashboard.skills.store') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Skill Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label for="icon" class="dashboard-form-label">Skill Icon (image upload):</label>
            <input type="file" id="icon" name="icon" class="dashboard-form-input" accept="image/*">
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach to Categories:</label>
            <div class="dashboard-checkbox-group">
                @foreach($categories as $category)
                    <label class="dashboard-checkbox-item">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="dashboard-save-button">Save Skill</button>
    </form>
@endsection
