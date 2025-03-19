@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Category</h1>

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

    <form action="{{ route('dashboard.skills.storeCategory') }}" method="POST" class="dashboard-form">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Category Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" required>
        </div>

        <div class="dashboard-form-group">
            <label class="dashboard-form-label">Attach Existing Skills:</label>
            <div class="dashboard-checkbox-group">
                @foreach($skills as $skill)
                    <label class="dashboard-checkbox-item">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}">
                        {{ $skill->name }}
                    </label>
                @endforeach
            </div>
        </div>
        
        <button type="submit" class="dashboard-save-button">Save Category</button>
    </form>
@endsection
