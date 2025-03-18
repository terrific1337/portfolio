@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage About Me</h1>

    <a href="{{ route('dashboard.aboutme.create') }}" class="dashboard-add-button">+ Add Section</a>
    
    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <table class="dashboard-table">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($aboutmes as $aboutme)
            <tr>
                <td>{{ $aboutme->id }}</td>
                <td>{{ $aboutme->name }}</td>
                <td>
                    <a href="{{ route('dashboard.aboutme.edit', $aboutme->id) }}" class="dashboard-edit-button">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.aboutme.destroy', $aboutme->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this section?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dashboard-delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
