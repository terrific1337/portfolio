@extends('dashboard.master')

@section('dashboard_section')
    <h1>Add New Project</h1>

    <form action="{{ route('dashboard.projects.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="tags">Tags</label>
            
            <input type="text" name="tags" id="tags" placeholder="e.g. Laravel, PHP, CSS">
        </div>

        <button type="submit">Create Project</button>
    </form>
@endsection
