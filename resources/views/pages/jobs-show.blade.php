@extends('layouts.app')

@section('content')
@include('layouts.partials.header')

<div class="job-detail-container">
    <a href="{{ route('jobs.index') }}" class="back-to-jobs">← Back to Jobs</a>
    <div class="job-header">
        <img src="{{ asset($job->companylogo) }}" alt="{{ $job->companyname }} Logo">
        <h1>{{ $job->companyname }}</h1>
    </div>

    <div class="job-info">
        <p><strong>Sector / Industry:</strong> {{ $job->companysector }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Description:</strong> {{ $job->companydescription }}</p>
        <p><strong>Contact Person:</strong> {{ $job->contactperson }}</p>
        <p><strong>Website:</strong> <a href="{{ $job->companywebsite }}" target="_blank">{{ $job->companywebsite }}</a></p>
    </div>

    <div class="job-info">
        <p><strong>Job Title:</strong> {{ $job->jobtitle }}</p>
        <p><strong>Internship:</strong> {{ $job->intern }}</p>
        <p><strong>Status:</strong> {{ $job->status }}</p>
        <p><strong>Start Date:</strong> {{ $job->startdate }}</p>
        <p><strong>End Date:</strong> {{ $job->enddate }}</p>
        <p><strong>Experience:</strong> {{ $job->jobdescription }}</p>
    </div>

</div>

@endsection
