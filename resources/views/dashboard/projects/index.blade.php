@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage Projects</h1>

    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-flex-grid">
        <div class="dashboard-half">
            <h2 class="dashboard-subheading">Projects</h2>
            <a href="{{ route('dashboard.projects.create') }}" class="dashboard-add-button">+ Add Project</a>
        
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>
                                <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="dashboard-edit-button">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dashboard-delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="dashboard-half">
            <h2 class="dashboard-subheading">Tags</h2>
            <a href="{{ route('dashboard.projects.addTag') }}" class="dashboard-add-button">+ Add Tag</a>
            
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Projects</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                @foreach($tag->projects as $project)
                                    <span class="badge">{{ $project->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('dashboard.projects.editTag', $tag->id) }}" class="dashboard-edit-button">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.projects.destroyTag', $tag->id) }}" method="POST" onsubmit="return confirm('Delete this tag?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dashboard-delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
