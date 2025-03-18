@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Manage Skills & Categories</h1>

    @if (session('success'))
        <div class="dashboard-success-box">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-flex-grid">
        {{-- Left Column: Skills --}}
        <div class="dashboard-half">
            <h2 class="dashboard-subheading">Skills</h2>
            <a href="{{ route('dashboard.skills.create') }}" class="dashboard-add-button">+ Add Skill</a>

            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>
                                @foreach($skill->category as $cat)
                                    <span class="badge">{{ $cat->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('dashboard.skills.edit', $skill->id) }}" class="dashboard-edit-button">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Delete this skill?')">
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

        {{-- Right Column: Categories --}}
        <div class="dashboard-half">
            <h2 class="dashboard-subheading">Categories</h2>
            <a href="{{ route('dashboard.skills.addCategory') }}" class="dashboard-add-button">+ Add Category</a>

            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @foreach($category->skill as $skill)
                                    <span class="badge">{{ $skill->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('dashboard.skills.editCategory', $category->id) }}" class="dashboard-edit-button">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.skills.destroyCategory', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?')">
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
