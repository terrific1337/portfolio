@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage Jobs</h1>

    <a href="{{ route('dashboard.jobs.create') }}" class="dashboard-add-button">+ Add Job</a>
    
    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <table class="dashboard-table">
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Start</th>
            <th>End</th>
            <th>Intern</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->companyname }}</td>
                <td>{{ $job->startdate }}</td>
                <td>{{ $job->enddate }}</td>
                <td>{{ $job->intern }}</td>
                <td>
                    <a href="{{ route('dashboard.jobs.edit', $job->id) }}" class="dashboard-edit-button">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dashboard-delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
