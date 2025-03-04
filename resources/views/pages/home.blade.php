@extends('layouts.app')

@section('content')
<div class="HomeWrapper">
        <h1>Welcome on my portfolio.</h1>

    <ul class="CTA-container"> {{-- call to action buttons --}}
            <li class="CTA-about-me"><a href="/aboutme">About Me</a></li>
            <li class="CTA-view-projects"><a href="/projects">View Projects</a></li>
            <li class="CTA-contact-me"><a href="/contact">Contact Me</a></li>
    </ul>
</div>
@endsection
