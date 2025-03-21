@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Testimonial</h1>

    <a href="{{ route('dashboard.testimonials') }}" class="dashboard-back-button">← Back to Testimonial List</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.testimonials.store') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="title" class="dashboard-form-label">Title:</label>
            <input type="text" id="title" name="title" class="dashboard-form-input" value="{{ old('title') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="content" class="dashboard-form-label">Content:</label>
            <textarea id="content" name="content" class="dashboard-form-input">{{ old('content') }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="photo" class="dashboard-form-label">Photo:</label>
            <input type="file" id="photo" name="photo" class="dashboard-form-input" accept="image/*">
        </div>

        <button type="submit" class="dashboard-save-button">Save Job</button>
    </form>
@endsection
