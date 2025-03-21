@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage Testimonials</h1>
    <h2 class="dashboard-subheading">Testimonials</h2>
    <a href="{{ route('dashboard.testimonials.create') }}" class="dashboard-add-button">+ Add Testimonial</a>
    
    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <table class="dashboard-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->id }}</td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->title }}</td>
                <td>
                    <a href="{{ route('dashboard.testimonials.edit', $testimonial->id) }}" class="dashboard-edit-button">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dashboard-delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
