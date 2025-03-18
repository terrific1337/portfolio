@extends('dashboard.master')

@section('dashboard_section')

    <h1 class="dashboard-heading">Add New About Me</h1>

    <a href="{{  route('dashboard.aboutme') }}" class="dashboard-back-button">← Back to About Me List</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.aboutme.store') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Section Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="text" class="dashboard-form-label">Description:</label>
            <textarea id="text" name="text" class="dashboard-form-input">{{ old('text') }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="image" class="dashboard-form-label">Section Image:</label>
            <input type="file" id="image" name="image" class="dashboard-form-input" accept="image/*">
        </div>

        <button type="submit" class="dashboard-save-button">Save Section</button>
    </form>
@endsection