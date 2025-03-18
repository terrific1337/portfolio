@extends('dashboard.master')

@section('dashboard_section')
    <h1 class="dashboard-heading">Add New Job</h1>

    <a href="{{ route('dashboard.jobs') }}" class="dashboard-back-button">← Back to Job List</a>

    @if ($errors->any())
        <div class="dashboard-error-box">
            <ul class="dashboard-error-list">
                @foreach ($errors->all() as $error)
                    <li class="dashboard-error-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.jobs.store') }}" method="POST" class="dashboard-form" enctype="multipart/form-data">
        @csrf

        <div class="dashboard-form-group">
            <label for="companyname" class="dashboard-form-label">Company Name:</label>
            <input type="text" id="companyname" name="companyname" class="dashboard-form-input" value="{{ old('companyname') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="startdate" class="dashboard-form-label">Start Date:</label>
            <input type="date" id="startdate" name="startdate" class="dashboard-form-input" value="{{ old('startdate') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="enddate" class="dashboard-form-label">End Date:</label>
            <input type="date" id="enddate" name="enddate" class="dashboard-form-input" value="{{ old('enddate') }}">
        </div>

        <div class="dashboard-form-group">
            <label for="companydescription" class="dashboard-form-label">Company Description:</label>
            <textarea id="companydescription" name="companydescription" class="dashboard-form-input">{{ old('companydescription') }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="location" class="dashboard-form-label">Location:</label>
            <input type="text" id="location" name="location" class="dashboard-form-input" value="{{ old('location') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="jobtitle" class="dashboard-form-label">Job Title:</label>
            <input type="text" id="jobtitle" name="jobtitle" class="dashboard-form-input" value="{{ old('jobtitle') }}" required>
        </div>

        <div class="dashboard-form-group">
            <label for="status" class="dashboard-form-label">Status:</label>
            <select id="status" name="status" class="dashboard-form-input" required>
                <option value="">-- Select Status --</option>
                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="dashboard-form-group">
            <label for="intern" class="dashboard-form-label">Is Internship?</label>
            <select id="intern" name="intern" class="dashboard-form-input" required>
                <option value="0" {{ old('intern') == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('intern') == '1' ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <div class="dashboard-form-group">
            <label for="contactperson" class="dashboard-form-label">Contact Person:</label>
            <input type="text" id="contactperson" name="contactperson" class="dashboard-form-input" value="{{ old('contactperson') }}">
        </div>

        <div class="dashboard-form-group">
            <label for="jobdescription" class="dashboard-form-label">Experience:</label>
            <textarea id="jobdescription" name="jobdescription" class="dashboard-form-input">{{ old('jobdescription') }}</textarea>
        </div>

        <div class="dashboard-form-group">
            <label for="companysector" class="dashboard-form-label">Company Sector:</label>
            <input type="text" id="companysector" name="companysector" class="dashboard-form-input" value="{{ old('companysector') }}">
        </div>

        <div class="dashboard-form-group">
            <label for="companywebsite" class="dashboard-form-label">Company Website:</label>
            <input type="text" id="companywebsite" name="companywebsite" class="dashboard-form-input" value="{{ old('companywebsite') }}">
        </div>

        <div class="dashboard-form-group">
            <label for="companylogo" class="dashboard-form-label">Company Logo Path:</label>
            <input type="file" id="companylogo" name="companylogo" class="dashboard-form-input" accept="image/*">
        </div>

        <button type="submit" class="dashboard-save-button">Save Job</button>
    </form>
@endsection
