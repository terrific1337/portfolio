@extends('layouts.app')

@section('content')
@include('layouts.partials.header')

@php
    use App\Models\Jobs;
    // Order jobs by startdate descending (newest first)
    $jobs = Jobs::orderBy('startdate', 'desc')->get();
@endphp

<div class="jobs-container">
    @if($jobs->count())
        @foreach($jobs as $job)
            <a href="{{ route('jobs.show', $job->id) }}" class="job-card">
                <h2>{{ $job->companyname }}</h2>
                <img src="{{ asset($job->companylogo) }}" alt="{{ $job->companyname }} Logo">
                <p>{{ \Carbon\Carbon::parse($job->startdate)->format('F Y') }}</p>
            </a>
        @endforeach
    @else
        <p class="no-jobs">No companies available.</p>
    @endif
</div>

@endsection
