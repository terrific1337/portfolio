@extends('layouts.app')

@section('content')
    <div class="dashboard-flex">
        @include('layouts.partials.menu-sidebar') {{-- Sidebar stays persistent --}}

        <div class="dashboard-content">
            @yield('dashboard_section') {{-- This part changes on each dashboard page --}}
        </div>
    </div>
@endsection
