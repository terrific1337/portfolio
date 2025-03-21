@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Edit Testimonial</h1>

    <a href="{{ route('dashboard.testimonials') }}" class="dashboard-back-button">← Back to Testimonials List</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.testimonials.update', $testimonial->id) }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="dashboard-form-group">
            <label for="name" class="dashboard-form-label">Name:</label>
            <input type="text" id="name" name="name" class="dashboard-form-input" value="{{ old('name', $testimonial->name) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="title" class="dashboard-form-label">Title:</label>
            <input type="text" id="title" name="title" class="dashboard-form-input" value="{{ old('title', $testimonial->title) }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="content" class="dashboard-form-label">Content:</label>
            <textarea id="content" name="content" class="dashboard-form-input">{{ old('content', $testimonial->content) }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="photo" class="dashboard-form-label">Photo (Upload new if replacing):</label>
            <input type="file" id="photo" name="photo" class="dashboard-form-input" accept="image/*">
            @if ($testimonial->photo)
                <p class="dashboard-description">Current: <a href="{{ asset('storage/' . $testimonial->photo) }}" target="_blank">{{ $testimonial->photo }}</a></p>
            @endif
        </div>

        <button type="submit" class="dashboard-save-button">Update Testimonial</button>
    </form>
@endsection
