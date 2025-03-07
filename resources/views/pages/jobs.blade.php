@extends('layouts.app')

@section('content')

    @php
        use App\Models\Jobs;
        $jobs = Jobs::all(); // Fetch all jobs
    @endphp
    <h1>Companies</h1>

    @if($jobs->count())
        <ul>
            @foreach($jobs as $job)
                <li>
                    <a href="{{ route('jobs.show', $job->id) }}">
                        {{ $job->companyname }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No companies available.</p>
    @endif
@endsection
