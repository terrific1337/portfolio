@extends('layouts.app') <!-- This ensures it uses the main layout -->

@section('content')

    <h1>{{ $job->companyname }}</h1>
    <p><strong>Job Title:</strong> {{ $job->title }}</p>
    <p><strong>Description:</strong> {{ $job->description }}</p>
    <small>Posted on: {{ $job->created_at ? $job->created_at->format('d M Y') : 'Unknown Date' }}</small>

    <br>
    <a href="{{ route('jobs.index') }}">Back to Jobs</a>

@endsection
