@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage Users</h1>

    <a href="{{ route('dashboard.users.create') }}" class="dashboard-add-button">+ Add User</a>
    
    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <table class="dashboard-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->level }}</td>
                <td>
                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="dashboard-edit-button">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dashboard-delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
